<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\SettingSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="setting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?= $form->field($model, 'logo_img') ?>

    <?= $form->field($model, 'site_name') ?>

    <?php // echo $form->field($model, 'instagram_url') ?>

    <?php // echo $form->field($model, 'telegram_url') ?>

    <?php // echo $form->field($model, 'youtube_url') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
