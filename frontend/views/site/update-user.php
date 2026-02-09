<?php

?>

<?php if (Yii::$app->session->hasFlash('user')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        <?= Yii::$app->session->getFlash('user') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php $form = \yii\bootstrap5\ActiveForm::begin([
    'id' => 'user-form',
    'action' => ['update-user'],
    'options' => ['data' => ['pjax' => true]],

]); ?>



<?= $form->field($user, 'username') ?>

<?= $form->field($user, 'email') ?>

<?= \yii\bootstrap5\Html::submitButton('Change', ['class' => 'btn btn-primary']) ?>

<?php \yii\bootstrap5\ActiveForm::end(); ?>
