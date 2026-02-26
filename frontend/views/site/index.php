<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>

    <div class="container-fluid carousel bg-light px-0">
        <div class="row g-0 justify-content-end">

            <div class="col-12 col-lg-7 col-xl-9">
                <div class="header-carousel owl-carousel bg-light py-5">

                    <?php foreach ($sliders as $slider): ?>
                        <div class="row g-0 header-carousel-item align-items-center">

                            <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="carousel-img ratio-577-432">
                                    <img src="<?= $slider->img ?>" class="img-fluid w-100" alt="Image">

                                </div>
                            </div>

                            <div class="col-xl-6 carousel-content p-4">
                                <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s"
                                    style="letter-spacing: 3px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">
                                    Save Up To A $400</h4>
                                <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s"
                                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                                    Welcome to our Rental Shop You can buy and rent your things</h1>
                                <p class="text-dark wow fadeInRight" data-wow-delay="0.5s"
                                   style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
                                    Terms and Condition Apply</p>
                                <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s"
                                   href="<?= \yii\helpers\Url::to(['equipment/create']) ?>"
                                   style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInRight;">Book
                                    Now</a>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <?php foreach ($special_offers as $special_offer): ?>
                <div class="col-12 col-lg-5 col-xl-3 wow fadeInRight" data-wow-delay="0.1s"
                     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">
                    <div class="carousel-header-banner h-100">
                        <img src="/<?= $special_offer->equipment->img ?>" width="300" class="img-fluid w-100 h-100"
                             style="object-fit: contain;" alt="Image">
                        <div class="carousel-banner-offer">

                            <p class="text-primary fs-5 fw-bold mb-0">Special Offers</p>
                        </div>
                        <div class="carousel-banner">
                            <div class="carousel-banner-content text-center p-4">
                                <a href="<?= \yii\helpers\Url::to(['category/index']) ?>" class="d-block mb-2"><?= $special_offer->equipment->category->name ?></a>
                                <a href="<?= \yii\helpers\Url::to(['shop/detail', 'id' => $special_offer->equipment_id]) ?>" class="d-block text-white fs-3"><?= $special_offer->equipment->name ?> <br>
                                    G2356</a>
                                <del class="me-2 text-white fs-5"><?= $special_offer->old_price ?></del>
                                <span class="text-primary fs-5"><?= $special_offer->new_price ?></span>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-6 col-md-4 col-lg-2 border-start border-end wow fadeInUp" data-wow-delay="0.1s"
                 style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="p-4">
                    <div class="d-inline-flex align-items-center">
                        <i class="fa fa-sync-alt fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Free Return</h6>
                            <p class="mb-0">30 days money back guarantee!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.2s"
                 style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-telegram-plane fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Free Shipping</h6>
                            <p class="mb-0">Free shipping on all order</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.3s"
                 style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-life-ring fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Support 24/7</h6>
                            <p class="mb-0">We support online 24 hrs a day</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.4s"
                 style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-credit-card fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Receive Gift Card</h6>
                            <p class="mb-0">Recieve gift all over oder $50</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.5s"
                 style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-lock fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Secure Payment</h6>
                            <p class="mb-0">We Value Your Security</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.6s"
                 style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-blog fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Online Service</h6>
                            <p class="mb-0">Free return products in 30 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid product py-5">
        <div class="container py-5">
            <div class="tab-class">
                <div class="row g-4">
                    <div class="col-lg-4 text-start wow fadeInLeft" data-wow-delay="0.1s"
                         style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                        <h1>Our Products</h1>
                    </div>
                    <div class="col-lg-8 text-end wow fadeInRight" data-wow-delay="0.1s"
                         style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <?php foreach ($categories as $index => $category): ?>
                                <li class="nav-item mb-4">
                                    <a class="d-flex mx-2 py-2 bg-light rounded-pill <?= $index === 0 ? 'active' : '' ?>"
                                       data-bs-toggle="pill"
                                       href="#tab-<?= $category->id ?>">
                <span class="text-dark" style="width: 130px;">
                    <?= $category->name ?>
                </span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                </div>
                <div class="tab-content">
                    <?php foreach ($categories as $index => $category): ?>
                        <div id="tab-<?= $category->id ?>"
                             class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?> p-0">

                            <div class="row g-4">
                                <?php foreach ($category->equipments as $equipment): ?>

                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="product-item rounded">
                                            <div class="product-item-inner border rounded">
                                                <a href="<?= \yii\helpers\Url::to(['/shop/detail', 'id'=> $equipment->id]) ?>"><img src="/<?= $equipment->img ?>" class="img-fluid w-100 rounded-top"></a>

                                                <div class="text-center p-3">
                                                    <h5><a href="<?= \yii\helpers\Url::to(['/shop/detail', 'id'=> $equipment->id]) ?>"><?= $equipment->name ?></a></h5>
                                                    <span class="text-primary fs-5">
                                        <?= $equipment->daily_price ?>
                                    </span>

                                                </div>
                                                <div class="product-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                                                    <a href="<?= \yii\helpers\Url::to(['/shop/cart', 'id' => $equipment->id]) ?>" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
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
                                                            <a href="#" class="text-primary d-flex align-items-center justify-content-center me-0"><span class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
<?php

$this->registerCss("
.ratio-577-432 {
    aspect-ratio: 577 / 432;
    width: 100%;
  
    overflow: hidden;
}

.ratio-577-432 img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

");





