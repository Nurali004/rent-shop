<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\Pjax;

$this->title = $user->username;
$this->params['breadcrumbs'][] = ['label' => 'Site', 'url' => ['profile']];
$this->params['breadcrumbs'][] = strip_tags($this->title);
\yii\web\YiiAsset::register($this);
?>

<div class="container py-5">
    <div class="row">

        <div class="d-flex">

            <?php  Pjax::begin(['enablePushState' => false,'id' => 'profile-pjax']);  ?>

            <?= $this->render('update-customer-image', ['customer' => $customer])  ?>

            <?php Pjax::end();  ?>

        </div>


        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h2>User Information</h2>
                </div>
                <div class="card-body">
                    <?php Pjax::begin(['enablePushState' => false, 'id' => 'user-pjax']); ?>



                    <?=  $this->render('update-user', ['user' => $user]) ?>

                    <?php Pjax::end() ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Customer Information</h2>
                </div>
                <div class="card-body">

                    <?php Pjax::begin(['enablePushState' => false, 'id' => 'customer-pjax']); ?>


                    <?= $this->renderAjax('update-profile', ['customer' => $customer]); ?>
                    <?php Pjax::end(); ?>


                </div>
            </div>

        </div>
    </div>
</div>



