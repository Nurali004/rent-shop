<?php

namespace frontend\controllers;

use common\models\Cart;
use common\models\Category;
use common\models\Customer;
use common\models\Equipment;
use common\models\EquipmentItem;
use common\models\Favorite;
use Yii;
use yii\web\Controller;

class ShopController extends Controller
{
    public $layout = 'rental';

    public function actionDetail($id)
    {
        $model = Equipment::findOne($id);
        $category = Category::findOne($model->category_id);
        $categories = Category::find()->with('equipments')->orderBy(['id' => SORT_ASC])->where(['pid' => $category->pid])->andWhere(['!=', 'id', $model->category_id])->all();

        $category_counts = Category::find()->select([
            'category.*',
            'count(child.id) as children_count',
        ])->alias('category')->leftJoin('category As child', 'child.pid = category.id')
            ->where(['category.pid' => null])
            ->groupBy('category.id')->asArray()->all();

        $equipment_items = EquipmentItem::find()->where(['equipment_id' => $model->id])->all();

        return $this->render('detail', [
            'model' => $model,
            'category_counts' => $category_counts,
            'equipment_items' => $equipment_items,
            'categories' => $categories,
        ]);

    }


    public function actionFavorite()
    {
        $customer = Customer::find()->where(['user_id' => Yii::$app->user->id])->one();
        $favorities = Favorite::find()->where(['customer_id' => $customer->id])->all();

        return $this->render('favorite', [
            'favorites' => $favorities,
        ]);



    }

    public function actionFavoriteAdd($id)
    {
        $favorite = new Favorite();

        $customer = Customer::find()->where(['user_id' => Yii::$app->user->id])->one();
        $favorite->customer_id = $customer->id;
        $favorite->equipment_id = $id;
        $favorite->save();

        return $this->redirect(['equipment/index']);

    }

    public function actionCategory()
    {
        $categories = Category::find()->all();
        return $this->render('category', [
            'categories' => $categories,
        ]);



    }

}