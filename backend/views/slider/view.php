<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Slider $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = strip_tags($this->title);
\yii\web\YiiAsset::register($this);
?>
<div class="slider-view">



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
            'name:html',
                [
                        'attribute' => 'img',
                        'format' => 'html',
                        'value' => function ($model) {
                            return "<img src='$model->img' width='250' alt='$model->img'>";
                        }
                ],
            'url:html',
            'order',
        ],
    ]) ?>

</div>
