<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\EquipmentItem $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Equipment Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipment-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
                    return "<img src='/$model->img' alt='$model->img' width='300'>";
                }
            ]

        ],
    ]) ?>


</div>
