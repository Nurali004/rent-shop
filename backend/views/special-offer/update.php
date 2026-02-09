<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SpecialOffer $model */

$this->title = 'Update Special Offer: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Special Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="special-offer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
