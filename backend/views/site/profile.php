<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<?=

$this->title = "Site Profile";
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                <h2>User Information</h2>
            </div>
            <div class="card-body">

               <?php $form = \yii\bootstrap5\ActiveForm::begin([
                   'method' => 'post',
                   'action' => ['site/profile-update', 'id' => Yii::$app->user->identity->id],
               ]); ?>

                <?= $form->field($user, "username") ?>

                <?= $form->field($user, "email") ?>

               <?= \yii\bootstrap5\Html::submitButton("Change", ["class" => "btn btn-primary"]) ?>

                <?php \yii\bootstrap5\ActiveForm::end(); ?>


            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                <?php $user_form = ActiveForm::begin([
                    'id' => 'form-change',
                    'method' => 'post',
                    'action' => ['site/change-password'],
                ]); ?>
                <?= $user_form->field($model, 'oldPassword')->passwordInput() ?>
                <?= $user_form->field($model, 'newPassword')->passwordInput() ?>
                <?= $user_form->field($model, 'retypePassword')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Change', ['class' => 'btn btn-primary', 'name' => 'change-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>


