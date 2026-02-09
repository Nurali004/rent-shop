<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
?>

<?php $image_form = ActiveForm::begin([
    'id' => 'update-customer-image-form',
    'action' => ['update-customer-image'],
    'options' => [
        'enctype' => 'multipart/form-data',
        'data'=> ['pjax' => true]
    ],

]) ?>

<div class="profile-image text-center">
    <img id="customer-photo"
         src="/<?= $customer->img ?: 'images/default-avatar.png' ?>"
         width="200"
         height="200"
         alt="Customer Photo"
         class="img-thumbnail rounded-circle">

    <?= $image_form->field($customer, 'imageFile')->fileInput([
        'id' => 'photo-input',
        'style' => 'display:none',
        'accept' => 'image/*',
    ])->label(false) ?>

    <div class="mb-4">
        <button type="button" id="change-photo" class="btn btn-sm btn-primary">
            <i class="bi bi-camera"></i> Change Photo
        </button>
    </div>
</div>

<?php ActiveForm::end() ?>

<script>
    document.getElementById('photo-input').addEventListener('change', function(e) {
        const file = this.files[0];

        if (!file) return;

        if (!file.type.startsWith('image/')) {
            alert('Iltimos, faqat rasm yuklang!');
            this.value = '';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('Rasm hajmi 2MB dan kichik bo\'lishi kerak!');
            this.value = '';
            return;
        }


        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('customer-photo').src = event.target.result;
        }
        reader.readAsDataURL(file);

        setTimeout(function() {
            document.getElementById('update-customer-image-form').submit();
        }, 100);
    });

    document.getElementById('change-photo').addEventListener('click', function() {
        document.getElementById('photo-input').click();
    });
</script>