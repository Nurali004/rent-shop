<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\models\Category;
use common\models\Setting;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\assets\RentalAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


$category_counts = Category::find()
        ->select([
                'category.*',
                'COUNT(child.id) AS child_count'
        ])
        ->alias('category')
        ->leftJoin('category AS child', 'child.pid = category.id')
        ->where(['category.pid' => null])
        ->groupBy('category.id')
        ->asArray()
        ->all();

RentalAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>


<!-- Spinner Start -->

<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid px-5 d-none border-bottom d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-4 text-center text-lg-start mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a href="#" class="text-muted me-2"> Help</a><small> / </small>
                <a href="#" class="text-muted mx-2"> Support</a><small> / </small>
                <a href="#" class="text-muted ms-2"> Contact</a>

            </div>
        </div>
        <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
            <small class="text-dark" style="margin-right: 10px">Call Us: </small>
            <?php $setting = Setting::findOne(1); ?>

            <a href="#" class="text-muted"> <?= $setting->phone_number ?></a>
        </div>

        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-muted me-2" data-bs-toggle="dropdown"><small>
                            USD</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item"> Euro</a>
                        <a href="#" class="dropdown-item"> Dolar</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-muted mx-2" data-bs-toggle="dropdown"><small>
                            English</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item"> English</a>
                        <a href="#" class="dropdown-item"> Russian</a>
                        <a href="#" class="dropdown-item"> Spanol</a>
                        <a href="#" class="dropdown-item"> Italiano</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-muted ms-2" data-bs-toggle="dropdown"><small><i
                                    class="fa fa-home me-2"></i> My Account</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="<?= \yii\helpers\Url::to(['site/login']) ?>" class="dropdown-item"> Login</a>
                        <a href="<?= \yii\helpers\Url::to(['shop/show-cart']) ?>" class="dropdown-item"> My Card</a>
                        <a href="#" class="dropdown-item"> Account Settings</a>
                        <a href="<?= \yii\helpers\Url::to(['site/profile']) ?>" class="dropdown-item"> My Account</a>
                        <?php if (!Yii::$app->user->isGuest): ?>
                            <a href="<?= \yii\helpers\Url::to(['site/logout']) ?>" data-method="post" class="dropdown-item">Logout</a>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid px-5 py-4 d-none d-lg-block">
    <div class="row gx-0 align-items-center text-center">
        <div class="col-md-4 col-lg-3 text-center text-lg-start">
            <div class="d-inline-flex align-items-center">
                <a href="/" class="navbar-brand p-0">
                    <h1 class="display-5 text-primary m-0"><i
                                class="fas fa-shopping-bag text-secondary me-2"></i>Electron</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
            </div>
        </div>
        <div class="col-md-4 col-lg-6 text-center">
            <div class="position-relative ps-4">
                <div class="d-flex border rounded-pill">
                    <input class="form-control border-0 rounded-pill w-100 py-3" type="text"
                           data-bs-target="#dropdownToggle123" placeholder="Search Looking For?">
                    <select class="form-select text-dark border-0 border-start rounded-0 p-3" style="width: 200px;">
                        <option value="All Category">All Category</option>
                        <option value="Pest Control-2">Category 1</option>
                        <option value="Pest Control-3">Category 2</option>
                        <option value="Pest Control-4">Category 3</option>
                        <option value="Pest Control-5">Category 4</option>
                    </select>
                    <button type="button" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i
                                class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 text-center text-lg-end">
            <div class="d-inline-flex align-items-center">
                <a href="#" class="text-muted d-flex align-items-center justify-content-center me-3"><span
                        class="rounded-circle btn-md-square border"><i class="fas fa-random"></i></i></a>
                <a href="<?= \yii\helpers\Url::to(['shop/favorite']) ?>" class="text-muted d-flex align-items-center justify-content-center me-3"><span
                            class="rounded-circle btn-md-square border"><i class="fas fa-heart"></i></a>
                <?php if (Yii::$app->user->isGuest): ?>
                <a href="<?= \yii\helpers\Url::to(['site/login']) ?>" class="text-muted d-flex align-items-center justify-content-center"><span
                            class="rounded-circle btn-md-square border"><i class="fas fa-user"></i></span>
                    <span class="text-dark ms-2">Profile</span></a>

                <?php else: ?>
                <a href="<?= \yii\helpers\Url::to(['site/profile', 'id' => Yii::$app->user->id]) ?>" class="text-muted d-flex align-items-center justify-content-center"><span
                            class="rounded-circle btn-md-square border"><i class="fas fa-user"></i></span>
                    <span class="text-dark ms-2">Profile</span></a>
                    <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar p-0">
    <div class="row gx-0 bg-primary px-5 align-items-center">
        <div class="col-lg-3 d-none d-lg-block">
            <nav class="navbar navbar-light position-relative" style="width: 250px;">
                <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#allCat">
                    <h4 class="m-0"><i class="fa fa-bars me-2"></i>All Categories</h4>
                </button>
                <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                    <div class="navbar-nav ms-auto py-0">
                        <ul class="list-unstyled categories-bars">
                            <?php foreach ($category_counts as $category): ?>
                            <li>
                                <div class="categories-bars-item">
                                    <a href="#"><?= $category['name'] ?></a>

                                    <span>(<?= $category['child_count'] ?>)</span>

                                </div>
                            </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-12 col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
                <a href="" class="navbar-brand d-block d-lg-none">
                    <h1 class="display-5 text-secondary m-0"><i
                                class="fas fa-shopping-bag text-white me-2"></i>Electro</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars fa-1x"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <?php
                    NavBar::begin([

                            'brandUrl' => Yii::$app->homeUrl,
                            'options' => [
                                    'class' => 'navbar-nav ms-auto py-0',
                            ],
                    ]);
                    $menuItems = [
                            ['label' => 'Home', 'url' => ['/site/index']],
                            ['label' => 'Equipments', 'url' => ['/equipment/index']],
                            ['label' => 'About', 'url' => ['/site/about']],
                            ['label' => 'Contact', 'url' => ['/site/contact']],


                    ];
                    if (Yii::$app->user->isGuest) {
                        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                    }

                    echo Nav::widget([
                            'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
                            'items' => $menuItems,
                    ]);
                    if (Yii::$app->user->isGuest) {
                        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
                    } else {
                        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                                . Html::submitButton(
                                        'Logout (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'btn btn-link logout text-decoration-none']
                                )
                                . Html::endForm();
                    }
                    NavBar::end();
                    ?>



                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->
<?php if (isset($this->params['breadcrumbs'])): ?>
<div class="container-fluid page-header py-5">

        <?= Breadcrumbs::widget([

                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

            'navOptions' => [
                    'tag' => false

            ],
            'options' => [
                    'class' => 'breadcrumb justify-content-center mb-0 wow fadeInUp',
                'id' => false,
                'data-wow-delay' => '0.3s',
                'style'=>"visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;"
            ]
        ]) ?>
        <?= Alert::widget() ?>



</div>
<?php endif; ?>
<?= $content ?>



<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-4 rounded mb-5" style="background: rgba(255, 255, 255, .03);">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="rounded p-4">
                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                         style="width: 70px; height: 70px;">
                        <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4 class="text-white">Address</h4>
                        <p class="mb-2">123 Street New York.USA</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="rounded p-4">
                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                         style="width: 70px; height: 70px;">
                        <i class="fas fa-envelope fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4 class="text-white">Mail Us</h4>
                        <p class="mb-2">info@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="rounded p-4">
                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                         style="width: 70px; height: 70px;">
                        <i class="fa fa-phone-alt fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4 class="text-white">Telephone</h4>
                        <p class="mb-2">(+012) 3456 7890</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="rounded p-4">
                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                         style="width: 70px; height: 70px;">
                        <i class="fab fa-firefox-browser fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4 class="text-white">Yoursite@ex.com</h4>
                        <p class="mb-2">(+012) 3456 7890</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <div class="footer-item">
                        <h4 class="text-primary mb-4">Newsletter</h4>
                        <p class="mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                        <div class="position-relative mx-auto rounded-pill">
                            <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                   placeholder="Enter your email">
                            <button type="button"
                                    class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-primary mb-4">Customer Service</h4>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Contact Us</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Returns</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Order History</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Site Map</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Testimonials</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> My Account</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Unsubscribe Notification</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-primary mb-4">Information</h4>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> About Us</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Delivery infomation</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Warranty</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> FAQ</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Seller Login</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-primary mb-4">Extras</h4>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Brands</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Gift Vouchers</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Affiliates</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Wishlist</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Order History</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Track Your Order</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Track Your Order</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white"><a href="#" class="border-bottom text-white"><i
                                    class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right
                        reserved.</span>
            </div>
            <div class="col-md-6 text-center text-md-end text-white">

                <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a>.
                Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();

?>





