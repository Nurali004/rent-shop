<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Setting $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'imageFile')->fileInput(['accept' => 'image/*', 'class' => 'form-control']) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'site_name')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'instagram_url')->textarea(['rows' => 2]) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'telegram_url')->textarea(['rows' => 2]) ?>

        </div>
    </div>

<div class="row">
    <div class="col-lg-6">
        <?= $form->field($model, 'youtube_url')->textarea(['rows' => 2]) ?>

    </div>
    <div class="col-lg-6">
        <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

    </div>
</div>






<div class="d-flex justify-content-end mt-3">
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</div>


    <?php ActiveForm::end(); ?>

</div>
