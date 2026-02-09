<?php

use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Equipment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="equipment-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-6 mb-3">
            <?= $form->field($model, 'category_id')->dropDownList(
                    [
                            'prompt' => 'Select Category',
                            \common\models\Category::getCategoryList(),

                    ]
            ) ?>
        </div>
        <div class="col-lg-6 mb-3">
            <?= $form->field($model, 'status')->dropDownList([
                    1 => 'Active',
                0 => 'Inactive',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 mb-3">
            <?= $form->field($model, 'daily_price')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-3">
            <?= $form->field($model, 'imageFile')->fileInput(['accept' => 'image/*', 'class' => 'form-control']) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*', 'class' => 'form-control mb-3']) ?>



        </div>
    </div>






    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
            'options' => ['rows' => 10],
            'language' => 'ru',
            'clientOptions' => [
                    'plugins' => 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste help wordcount',
                    'toolbar' => 'undo redo | formatselect | bold italic | link image | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | code fullscreen',
                    'fontsize_formats' => '8pt 10pt 12pt 14pt 18pt 20pt 24pt 36pt',
                    'image_advtab' => true,
                    'image_class_list' => [
                            [
                                    'value' => '',
                                    'title' => 'None',
                            ],
                            [
                                    'value' => 'img-circle img-no-padding img-responsive',
                                    'title' => 'Circle',
                            ],
                            [
                                    'value' => 'img-rounded img-responsive',
                                    'title' => 'Rounded',
                            ],
                            [
                                    'value' => 'img-thumbnail img-responsive',
                                    'title' => 'Thumbnail',
                            ]
                    ],
                    'images_upload_url' => \yii\helpers\Url::to(['equipment/upload-image']),
                    'plugin_prevqiew_width' => 1110,
            ]
    ]);?>


    <div class="d-flex justify-content-end">
        <div class="form-group my-4">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

        </div>
    </div>





    <?php ActiveForm::end(); ?>

</div>
