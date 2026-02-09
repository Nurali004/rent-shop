<?php

use common\models\EquipmentItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\models\EquipmentItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Equipment Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Equipment Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                    'attribute' => 'equipment_id',
                'value' => function ($model) {
                    return $model->equipment->name;
                }
            ],
            [
                    'attribute' => 'img',
                'format' => 'raw',
                'value' => function ($model) {
                    return "<img src='/$model->img' alt='$model->img' width='250'>";
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, EquipmentItem $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <?=
    \yii\bootstrap5\LinkPager::widget([
            'pagination' => $dataProvider->pagination,
    ])
    ?>

</div>
