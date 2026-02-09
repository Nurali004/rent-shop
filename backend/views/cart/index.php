<?php

use common\models\Cart;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\models\CartSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Carts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cart', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            [
                    'attribute' => 'equipment_id',
                'value' => function ($model) {
                  return $model->equipment->name;
                }
            ],
            [
                    'attribute' => 'Owner Name',
                'value' => function ($model) {
                      return $model->equipment->owner->first_name;
                }
],
                [
                        'attribute' => 'Owner Phone',
                        'value' => function ($model) {
                            return $model->equipment->owner->phone;
                        }
                ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cart $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


    <?php Pjax::end(); ?>

</div>


