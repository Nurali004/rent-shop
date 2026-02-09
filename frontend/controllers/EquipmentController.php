<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Customer;
use common\models\Equipment;
use common\models\EquipmentItem;
use frontend\models\OrderSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EquipmentController implements the CRUD actions for Equipment model.
 */
class EquipmentController extends Controller
{
    public $layout = 'rental';
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Equipment models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination->pageSize = 9;



        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Equipment model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $category_counts = Category::find()->select('category.*, count(child.id) as children_count')
            ->alias('category')
            ->leftJoin('category AS child', 'child.pid = category.id')
            ->where(['category.pid' => null])
            ->groupBy('category.id')
            ->asArray()->all();

        $equipment = Equipment::findOne($id);
        $category = Category::findOne($equipment->category_id);

        $categories = Category::find()->where(['pid' => $category->pid])->andWhere(['!=', 'id', $equipment->category_id])->all();

        $equipment_items = EquipmentItem::find()->where(['equipment_id' => $equipment->id])->all();



        return $this->render('view', [
            'model' => $this->findModel($id),
            'category_counts' => $category_counts,
            'categories' => $categories,
            'equipment' => $equipment,
            'equipment_items' => $equipment_items,
        ]);
    }

    /**
     * Creates a new Equipment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Equipment();

        if ($this->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->upload();

            $ids = [];

            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if (!is_null($model->imageFiles)) {
                $ids = $model->uploads();
            }

            if (Yii::$app->user->isGuest){

                return $this->redirect(['site/login']);

            }
            $customer = Customer::findOne(Yii::$app->user->identity->id);



            if ($model->load($this->request->post())) {
                $model->owner_id = $customer->id;

                if ($model->save()) {

                    foreach ($ids as $id) {
                        $equipmentItem = EquipmentItem::findOne($id);
                        $equipmentItem->equipment_id = $model->id;
                        $equipmentItem->save();

                    }


                    return $this->redirect(['view', 'id' => $model->id]);
                }


            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Equipment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (!is_null($model->imageFile)) {
                $model->upload();
            }



            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if (!is_null($model->imageFiles)) {
                $model->uploads($id);
            }

            $customer = Customer::findOne(Yii::$app->user->identity->id);
            $model->owner_id = $customer->id;

            if ($model->load($this->request->post())) {
                if ($model->save()) {

                    return $this->redirect(['view', 'id' => $model->id]);
                }

            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Equipment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Equipment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Equipment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Equipment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
