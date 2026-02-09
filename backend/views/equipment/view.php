<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Equipment $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipment-view">

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
                    'attribute' => 'category_id',
                'value' => function ($model) {
                     return $model->category->name;
                }
            ],
            'name',
            'description:html',
            [
                    'attribute' => 'img',
                'format' => 'raw',
                'value' => function ($model) {
                     return "<img src='/$model->img' alt='$model->img' width='200'>";
                }
            ],
            'status',
            'daily_price',
            'created_at',
            'updated_at',
            [
                    'attribute' => 'owner_id',
                'value' => function ($model) {
                   return $model->owner->first_name;
                }
            ],
        ],
    ]) ?>


    <?php foreach ($images as $image): ?>

        <?php

    echo "<img src='/$image->img' alt='$model->img' width='200' class='img-thumbnail m-3'>";
        ?>

    <?php endforeach; ?>

</div>
