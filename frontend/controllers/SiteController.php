<?php

namespace frontend\controllers;

use backend\controllers\SpecialOfferController;
use common\models\Category;
use common\models\Customer;
use common\models\Equipment;
use common\models\Slider;
use common\models\SpecialOffer;
use common\models\User;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'rental';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup', 'profile', 'update-user', 'update-profile', 'update-customer-image'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'profile', 'update-user', 'update-profile', 'update-customer-image'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $sliders = Slider::find()->all();

        $categories = Category::find()->where(['status' => 0])->with('equipments')->limit(5)->all();


        $special_offers = SpecialOffer::find()->all();
        return $this->render('index', [
            'sliders' => $sliders,
            'special_offers' => $special_offers,
            'categories' => $categories,


        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->verifyEmail()) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionProfile()
    {
        $user = Yii::$app->user->identity;
        if (!$user) {
            return $this->redirect(['site/login']);
        }

        $customer = Customer::findOne(['user_id' => $user->id]);


        return $this->render('profile', ['user' => $user, 'customer' => $customer]);

    }

    public function actionUpdateUser()
    {

        $user = User::findOne(['id' => Yii::$app->user->identity->id]);

        if (Yii::$app->request->isPost) {
            $user->username = Yii::$app->request->post('User')['username'];
            $user->email = Yii::$app->request->post('User')['email'];

            if ($user->save()) {
                Yii::$app->session->setFlash('user', 'Your profile has been updated.');
            }
        }

        return $this->renderAjax('update-user', ['user' => $user]);


    }


    public function actionUpdateProfile()
    {


        if (Yii::$app->request->isPost) {

            $customer = Customer::findOne(['user_id' => Yii::$app->user->identity->id]);
            $customer->first_name = Yii::$app->request->post('Customer')['first_name'];
            $customer->last_name = Yii::$app->request->post('Customer')['last_name'];
            $customer->phone = Yii::$app->request->post('Customer')['phone'];
            $customer->address = Yii::$app->request->post('Customer')['address'];
            $customer->user_id = Yii::$app->user->identity->id;
            $customer->passport = Yii::$app->request->post('Customer')['passport'];
            if (!is_null($customer->img)) {

                Yii::$app->session->setFlash('success', 'Customer has been updated.');

                $customer->save();
            }



        }

        return $this->renderAjax('update-profile', ['user' => Yii::$app->user->identity, 'customer' => $customer]);

    }


    public function actionUpdateCustomerImage()
    {
        $customer = Customer::findOne(['user_id' => Yii::$app->user->identity->id]);

        if (Yii::$app->request->isPost) {
            $imageFile = UploadedFile::getInstance($customer, 'imageFile');
            if ($imageFile) {
                $fileName = 'uploads/customer/'  . $imageFile->baseName . time(). '.' . $imageFile->extension;
                $fileNamePath = Yii::getAlias('@frontend'). '/web/' . $fileName;
                $imageFile->saveAs($fileNamePath);
                $customer->img = $fileName;
                if ($customer->updateAttributes(['img' => $fileName])) {

                Yii::$app->session->setFlash('customer-img', 'Customer image has been updated.');
                }
            }

            return $this->redirect(['profile']);


        }
        return $this->renderAjax('update-customer-image', ['customer' => $customer]);



    }

}
