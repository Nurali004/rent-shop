<?php

use common\models\Equipment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var frontend\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Equipments';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="product-categories mb-4">
                    <h4>Products Categories</h4>
                    <ul class="list-unstyled">
                        <li>
                            <div class="categories-item">
                                <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                    Accessories</a>
                                <span>(3)</span>
                            </div>
                        </li>
                        <li>
                            <div class="categories-item">
                                <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                    Electronics &amp; Computer</a>
                                <span>(5)</span>
                            </div>
                        </li>
                        <li>
                            <div class="categories-item">
                                <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>Laptops &amp; Desktops</a>
                                <span>(2)</span>
                            </div>
                        </li>
                        <li>
                            <div class="categories-item">
                                <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>Mobiles &amp; Tablets</a>
                                <span>(8)</span>
                            </div>
                        </li>
                        <li>
                            <div class="categories-item">
                                <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>SmartPhone &amp; Smart TV</a>
                                <span>(5)</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="price mb-4">
                    <h4 class="mb-2">Price</h4>
                    <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                    <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                    <div class=""></div>
                </div>

                <div class="featured-product mb-4">
                    <h4 class="mb-3">Other Categories</h4>
                    <?php foreach ($categories as $category): ?>
                    <?php foreach ($category->equipments as $equipment): ?>
                    <div class="featured-product-item">
                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                            <a href="<?= Url::to(['shop/detail', 'id' => $equipment->id]) ?>">

                            <img src="/<?= $equipment->img ?>" class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                        <div>
                            <h6 class="mb-2">
                                <a href="<?= Url::to(['shop/detail', 'id' => $equipment->id]) ?>">
                                    <?= $equipment->name ?>
                                </a>
                                </h6>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="d-flex mb-2">

                                <h5 class="fw-bold me-2"><?= $equipment->daily_price ?></h5>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endforeach; ?>

                    <div class="d-flex justify-content-center my-4">
                        <a href="#" class="btn btn-primary px-4 py-3 rounded-pill w-100">Vew More</a>
                    </div>
                </div>

            </div>



            <div class="col-lg-9 wow fadeInUp my-4" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">

                <div class="row g-4">
                    <div class="col-xl-7">
                        <div class="input-group w-100 mx-auto d-flex">
                            <?php $form = \yii\bootstrap5\ActiveForm::begin([
                                    'method' => 'post',
                                'action' => ['equipment/index'],
                                    'options' => ['class' => 'd-flex w-100']
                            ]) ?>

                            <?= $form->field($searchModel, 'name', ['template' => "{input}", 'options' => ['tag' => false]])->textInput(['class' => 'form-control p-3', 'placeholder' => 'keywords'])->label(false) ?>

                            <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary', 'style' => 'margin-left: 10px']) ?>

                           <?php \yii\bootstrap5\ActiveForm::end() ?>

<!--                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">-->
<!--                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>-->
                        </div>
                    </div>
                    <div class="col-xl-3 text-end">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between">
                            <label for="electronics">Sort By:</label>
                            <select id="electronics" name="electronicslist" class="border-0 form-select-sm bg-light me-3" form="electronicsform">
                                <option value="volvo">Default Sorting</option>
                                <option value="volv">Nothing</option>
                                <option value="sab">Popularity</option>
                                <option value="saab">Newness</option>
                                <option value="opel">Average Rating</option>
                                <option value="audio">Low to high</option>
                                <option value="audi">High to low</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="tab-content mt-4">



                    <div class="tab-pane fade show p-0 active">
                        <div class="row g-4 product">
                            <?php foreach ($dataProvider->getModels() as $equipment): ?>
                            <div class="col-lg-4">
                                <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                    <div class="product-item-inner border rounded">
                                        <div class="product-item-inner-item">
                                            <a href="<?= Url::to(['shop/detail', 'id' => $equipment->id]) ?>"><img src="/<?= $equipment->img ?>" class="img-fluid w-100 rounded-top" alt=""></a>

                                            <div class="product-details">
                                                <a href="<?= Url::to(['/shop/detail', 'id' => $equipment->id]) ?>"><i class="fa fa-eye fa-1x"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center rounded-bottom p-4">
                                            <a href="#" class="d-block mb-2"><?= $equipment->category->name ?></a>
                                            <a href="<?= Url::to(['shop/detail', 'id' => $equipment->id]) ?>" class="d-block h4"><?= $equipment->name ?></a>
                                            <span class="text-primary fs-5"><?= $equipment->daily_price ?></span>
                                        </div>
                                    </div>
                                    <div class="product-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                                        <a href="<?= Url::to(['/shop/card', 'id' => $equipment->id]) ?>" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex">
                                                <i class="fas fa-star text-primary"></i>
                                                <i class="fas fa-star text-primary"></i>
                                                <i class="fas fa-star text-primary"></i>
                                                <i class="fas fa-star text-primary"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="d-flex">
                                                <a href="#" class="text-primary d-flex align-items-center justify-content-center me-3"><span class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></span></a>
                                                <a href="<?= Url::to(['shop/favorite-add', 'id' => $equipment->id]) ?>" class="text-primary d-flex align-items-center justify-content-center me-0"><span class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <div class="pagination d-flex justify-content-center mt-5">

                                    <?= \yii\bootstrap5\LinkPager::widget([

                                            'pagination' => $dataProvider->pagination,

                                            'listOptions' => [
                                                    'tag' => false
                                            ],
                                        'linkContainerOptions' => [
                                                'tag' => false
                                        ],
                                        'options' => [
                                                'tag' => false,

                                        ],
                                        'linkOptions' => [
                                                'class' => 'rounded',
                                        ]

                                            ]) ?>
<!--                                    <a href="#" class="rounded">«</a>-->
<!--                                    <a href="#" class="active rounded">1</a>-->
<!--                                    <a href="#" class="rounded">2</a>-->
<!--                                    <a href="#" class="rounded">3</a>-->
<!--                                    <a href="#" class="rounded">4</a>-->
<!--                                    <a href="#" class="rounded">5</a>-->
<!--                                    <a href="#" class="rounded">6</a>-->
<!--                                    <a href="#" class="rounded">»</a>-->
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
