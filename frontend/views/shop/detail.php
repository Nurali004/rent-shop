<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;

?>

<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-5 col-xl-3 wow fadeInUp" data-wow-delay="0.1s"
                 style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="input-group w-100 mx-auto d-flex mb-4">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                           aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
                <div class="product-categories mb-4">
                    <h4>Products Categories</h4>
                    <ul class="list-unstyled">
                        <?php foreach ($category_counts as $category): ?>
                            <li>
                                <div class="categories-item">
                                    <a href="<?= Url::to(['equipment/category-index', 'id'=> $category['id']]) ?>" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                        <?= $category['name'] ?></a>
                                    <span>(<?= $category['children_count'] ?>)</span>
                                </div>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>

                <div class="featured-product mb-4">
                    <h4 class="mb-3">Featured products</h4>
                    <?php foreach ($categories as $category): ?>
                    <?php foreach ($category->equipments as $equipment): ?>
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
                <a href="#">
                </a>



            </div>
            <div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 single-product">
                    <div class="col-xl-6">
                        <div class="single-carousel owl-carousel">
                            <?php foreach ($equipment_items as $equipment_item): ?>
                            <div class="single-item"
                                 data-dot="<img class='img-fluid' src='/<?= $equipment_item->img ?>' alt=''>">
                                <div class="single-inner bg-light rounded">
                                    <img src="/<?= $equipment_item->img ?>"  class="img-fluid rounded" alt="Image">
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <div class="col-xl-6">
                        <h4 class="fw-bold mb-3"><?= Html::encode($model->name) ?></h4>

                        <p class="mb-2">
                            Category:
                            <strong><?= Html::encode($model->category->name) ?></strong>
                        </p>

                        <h5 class="fw-bold mb-3">
                            <?= Html::encode($model->daily_price) ?>
                        </h5>

                        <div class="d-flex mb-3">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>

                        <div class="mb-3">
                            <small>
                                Available:
                                <strong class="text-primary">
                                    <?= $model->status == 1 ? 'Available' : 'Not available' ?>
                                </strong>
                            </small>
                        </div>

                        <p class="mb-2">
                            Product Owner:
                            <?= Html::encode($model->owner->first_name . ' ' . $model->owner->last_name) ?>
                        </p>

                        <p class="mb-4">
                            Phone:
                            <a href="tel:<?= $model->owner->phone ?>">
                                <?= Html::encode($model->owner->phone) ?>
                            </a>
                        </p>

                        <a href="<?= Url::to(['/shop/card', 'id' => $model->id]) ?>"
                           class="btn btn-info rounded-pill px-4 py-2 text-white">
                            <i class="fa fa-shopping-bag me-2"></i> Save to cart
                        </a>
                    </div>
                    <div class="col-12 mt-5">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <button class="nav-link active"
                                        data-bs-toggle="tab"
                                        data-bs-target="#description">
                                    Description
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link"
                                        data-bs-toggle="tab"
                                        data-bs-target="#reviews">
                                    Reviews
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description">
                                <?= $model->description ?>
                            </div>

                            <div class="tab-pane fade" id="reviews">
                                Reviews coming soon…
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="text" class="form-control border-0 me-4" placeholder="Yur Name *">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="email" class="form-control border-0" placeholder="Your Email *">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                        <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                                  placeholder="Your Review *" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Please rate:</p>
                                        <div class="d-flex align-items-center" style="font-size: 12px;">
                                            <i class="fa fa-star text-muted"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <a href="#"
                                       class="btn btn-primary border border-secondary text-primary rounded-pill px-4 py-3">
                                        Post Comment</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







