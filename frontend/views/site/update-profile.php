<?php

?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        <?= Yii::$app->session->getFlash('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<?php use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$customer_form = ActiveForm::begin([
        'id' => 'customer-form',
        'action' => ['update-profile'],
        'options' => ['data' => ['pjax' => true]],
]); ?>

<div class="row">
    <div class="col-lg-6">
        <?= $customer_form->field($customer, 'first_name')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-lg-6">
        <?= $customer_form->field($customer, 'last_name')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">

    <div class="col-lg-6">
        <?= $customer_form->field($customer, 'passport')->textInput([

                'maxlength' => 9, 'minlength' => 8, 'placeholder' => 'AD4162345',
                'style' => 'text-transform:uppercase;',
                'oninput' =>
                        'let val = this.value.toUpperCase();
                                let letters = val.slice(0,2).replace(/[^A-Z]/g, "");
                                let numbers = val.slice(2).replace(/[^0-9]/g, "");
                                this.value = letters + numbers;
                                
                                '

        ]) ?>

    </div>
    <div class="col-lg-6">

        <?= $customer_form->field($customer, 'phone')->textInput(['maxlength' => true]) ?>

    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <?= $customer_form->field($customer, 'address')->textarea(['rows' => 2]) ?>

    </div>
    <div class="col-lg-6">

        <div class="d-flex justify-content-end" style="margin-top: 50px; margin-right: 100px">

    <?= Html::submitButton('Change', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>




<div class="row">

    <div class="col-lg-6">
        <div class="form-group" style="margin-top: 45px">

        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>


