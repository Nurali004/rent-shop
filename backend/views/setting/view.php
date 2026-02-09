<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Setting $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="setting-view">

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
            'email:email',
            'phone_number',
            [
                    'attribute' => 'logo_img',
                'format' => 'raw',
                'value' => function($model){
                    return "<img src='/$model->logo_img' width='200' alt='$model->logo_img'>";
                }
            ],
            'site_name',
            'instagram_url:ntext',
            'telegram_url:ntext',
            'youtube_url:ntext',
            'description:html',
        ],
    ]) ?>

</div>
