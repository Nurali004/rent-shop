<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\EquipmentItem $model */

$this->title = 'Update Equipment Item: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Equipment Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipment-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
