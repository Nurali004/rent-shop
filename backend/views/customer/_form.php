<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Customer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport')->textInput([

            'maxlength' => 9, 'minlength' => 8, 'placeholder' => 'AD4162345',
        'style' => 'text-transform:uppercase;',
            'oninput' =>
                    'let val = this.value.toUpperCase();
                                let letters = val.slice(0,2).replace(/[^A-Z]/g, "");
                                let numbers = val.slice(2).replace(/[^0-9]/g, "");
                                this.value = letters + numbers;
                                
                                '

    ]) ?>

    <?= $form->field($model, 'imageFile')->fileInput(['accept' => 'image/*', 'class' => 'form-control']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
