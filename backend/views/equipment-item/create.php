<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\EquipmentItem $model */

$this->title = 'Create Equipment Item';
$this->params['breadcrumbs'][] = ['label' => 'Equipment Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
