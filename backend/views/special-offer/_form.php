<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SpecialOffer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="special-offer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'equipment_id')->dropDownList([
                    'prompt' => 'Select Equipment',
                    \common\models\Equipment::getLists(),

            ]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'is_active')->textInput() ?>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'new_price')->textInput(['maxlength' => true]) ?>

        </div>
    </div>







    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
