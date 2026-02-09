<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1 class="mt-3" style="text-align: center"><?= Html::encode($this->title) ?></h1>


</div>

<div class="container-fluid contact">
    <div class="container py-4">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">

                        <p class="mb-5 fs-5 text-dark text-primary border-bottom border-primary border-2 d-inline-block pb-2">Please enter your information
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-lg-6">
                        <h5 class="text-primary wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Let’s Login</h5>
                        <h1 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Login form</h1>

                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'rememberMe')->checkbox() ?>

                        <div class="my-1 mx-0" style="color:#999;">
                            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                            <br>
                            Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
