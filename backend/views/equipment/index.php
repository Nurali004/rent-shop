<?php

use common\models\Category;
use common\models\Equipment;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\models\EquipmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Equipments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Equipment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
            'pager' => [
                    'class' => yii\bootstrap5\LinkPager::className(),
],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                    'attribute' => 'category_id',
                'filter' => Html::activeDropDownList(
                        $searchModel,
                        'category_id',
                        Category::getCategoryList(),
                        ['class' => 'form-control', 'prompt' => '']
                ),
                'value' => function ($model) {
                    return $model->category->name;
                }




            ],
            [
                    'attribute' => 'name',
                  'filter' => Html::activeDropDownList(
                          $searchModel,
                          'name',
                          Equipment::getLists(),
                          ['class' => 'form-control', 'prompt' => '']
                  )

            ],
            'description:html',
            [
                    'attribute' => 'img',
                'format' => 'raw',
                'value' => function ($model) {
                     return "<img src='/$model->img' width='150'>";
                }
            ],
            //'status',
          //  'daily_price',
            //'created_at',
            //'updated_at',
            [
                    'attribute' => 'owner_id',
                'value' => function ($model) {
                    return $model->owner->first_name;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Equipment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
