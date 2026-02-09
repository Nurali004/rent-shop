<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SpecialOffer $model */

$this->title = 'Create Special Offer';
$this->params['breadcrumbs'][] = ['label' => 'Special Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="special-offer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
