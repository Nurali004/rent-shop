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
            <div class="col-lg-5 col-xl-3 wow fadeInUp" data-wow-delay="0.1s"
                 style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="input-group w-100 mx-auto d-flex mb-4">
                    <?php $search_form = \yii\bootstrap5\ActiveForm::begin([
                            'action' => ['equipment/index'],
                        'method' => 'get',
                            'options' => ['class' => 'd-flex'],

                    ]) ?>



                    <?= $search_form->field($searchModel, 'name', [
                            'template' => "{input}",

                            'options' => ['class' => 'flex-grow-1 me-2']])->textInput(['class' => 'form-control p-3', 'placeholder' => 'keywords'])->label(false) ?>

                    <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary px-3']) ?>

                    <?php \yii\bootstrap5\ActiveForm::end() ?>

                </div>
                <div class="product-categories mb-4">
                    <h4>Products Categories</h4>
                    <ul class="list-unstyled">
                        <?php foreach ($category_counts as $category): ?>
                            <li>
                                <div class="categories-item">
                                    <a href="<?= Url::to(['equipment/category-index', 'id' => $category['id']]) ?>" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                        <?= $category['name'] ?></a>
                                    <span>(<?= $category['children_count'] ?>)</span>
                                </div>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>

                <div class="featured-product mb-4">
                    <h4 class="mb-3">Other Categories</h4>
                    <?php foreach ($featured_categories as $featured_category): ?>
                    <?php foreach ($featured_category->equipments as $equipment): ?>

                            <div class="featured-product-item">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <a href="<?= Url::to(['shop/detail', 'id'=> $equipment->id]) ?>"><img src="/<?= $equipment->img ?>" class="img-fluid rounded" alt="Image"></a>

                                </div>
                                <div>

                                    <h6 class="mb-2"><a href="<?= Url::to(['shop/detail', 'id'=> $equipment->id]) ?>"><?= $equipment->name ?></a></h6>
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
                        <a href="<?= Url::to(['equipment/index']) ?>" class="btn btn-primary px-4 py-3 rounded-pill w-100">Vew More</a>
                    </div>
                </div>
                <a href="<?= Url::to(['equipment/index']) ?>">
                </a>


            </div>
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="rounded mb-4 position-relative">


                </div>
                <div class="row g-4">
                    <div class="col-xl-7">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
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
                            <?php foreach ($equipments as $equipment): ?>
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

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
