<?php

?>


<h2>Email Verification</h2>

<?php $form = \yii\bootstrap5\ActiveForm::begin([]) ?>

<?= $form->field($model, 'code')->textInput()->label(false) ?>

<div class="form-group">
    <?=  \yii\bootstrap5\Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>


<?php \yii\bootstrap5\ActiveForm::end() ?>



