<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">


</div>

<div class="container-fluid contact">
    <div class="container py-4">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">

                        <p class="mb-5 fs-5 text-dark text-primary border-bottom border-primary border-2 d-inline-block pb-2">We are here for you! how can we help, We are here for you!
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-lg-6">
                        <h5 class="text-primary wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Let’s Connect</h5>
                        <h1 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">Send Your Message</h1>

                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'subject') ?>

                        <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="row g-4 align-items-center justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-2">123 Street New York.USA</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                                    <i class="fas fa-envelope fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-2">info@example.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                                    <i class="fa fa-phone-alt fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                                    <i class="fab fa-firefox-browser fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>Yoursite@ex.com</h4>
                                    <p class="mb-2">(+012) 3456 7890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
