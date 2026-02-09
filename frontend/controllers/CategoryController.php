<?php

namespace frontend\controllers;

use common\models\Category;
use yii\web\Controller;

class CategoryController extends Controller
{

    public $layout = 'rent';

    public function actionIndex()
    {
       $categories = Category::find()->where(['status' => 1])->all();

       return $this->render('index', [
           'categories' => $categories,
       ]);

    }

}