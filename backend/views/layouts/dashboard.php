<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

\backend\assets\DashboardAsset::register($this);
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



<div id="wrapper">

    <!-- Sidebar -->


    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'brandOptions' => ['class' => 'sidebar-brand d-flex align-items-center'],
        'options' => [
            'class' => 'navbar-nav bg-gradient-primary sidebar sidebar-dark accordion',
            'id' => 'accordionSidebar'
        ],
        'innerContainerOptions' => ['class' => false],
        'togglerOptions' => ['class' => false],
        'collapseOptions' => false,
    ]);
    $menuItems = [
        ['label' => '<i class="fas fa-fw fa-home"></i>'.'Home', 'url' => ['/site/index'], 'options' => ['class' => 'nav-item active']],
        ['label' => '<i class="fas fa-fw fa-folder"></i>'.'Category', 'url' => ['/category/index'], 'options' => ['class' => 'nav-item active']],
        ['label' => '<i class="fas fa-fw fa-people-arrows"></i>'.'Customer', 'url' => ['/customer/index'], 'options' => ['class' => 'nav-item active']],
        ['label' => '<i class="fas fa-fw fa-tools"></i>'.'Equipment', 'url' => ['/equipment/index'], 'options' => ['class' => 'nav-item active']],
        ['label' => '<i class="fas fa-fw fa-handshake"></i>'.'Orders', 'url' => ['/order/index'], 'options' => ['class' => 'nav-item active']],
        ['label' => '<i class="fas fa-fw fa-sliders-h"></i>'.'Sliders', 'url' => ['/slider/index'], 'options' => ['class' => 'nav-item active']],
        ['label' => '<i class="fas fa-fw fa-star"></i>'.'SpecialOffers', 'url' => ['/special-offer/index'], 'options' => ['class' => 'nav-item active']],
        ['label' => '<i class="fas fa-fw fa-cogs"></i>'.'Settings', 'url' => ['/setting/index'], 'options' => ['class' => 'nav-item active']],
        ['label' => '<i class="fas fa-fw fa-shopping-cart"></i>'.'Carts', 'url' => ['/cart/index'], 'options' => ['class' => 'nav-item active']],
        ['label' => '<i class="fas fa-fw fa-sliders-h"></i>'.'OrderItems', 'url' => ['/order-item/index'], 'options' => ['class' => 'nav-item active']],
        ['label' => '<i class="fas fa-fw fa-toolbox"></i>'.'EquipmentItems', 'url' => ['/equipment-item/index'], 'options' => ['class' => 'nav-item active']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-primary']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
    <!-- End of Sidebar -->
    <!--    <header>-->

    <!--    </header>-->

    <!-- Content Wrapper -->

    <!-- End of Content Wrapper -->

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1 show">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->

                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="<?= \yii\helpers\Url::to(['site/profile']) ?>" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><h6><?= Yii::$app->user->identity->username ?></h6></span>
                            <img class="img-profile rounded-circle" src="/admin/dashboard/img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['/site/profile']) ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['/setting/update', 'id' => 1]) ?>">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <?php

                            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                                . Html::submitButton(
                                    ' <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Sign Out',
                                    ['class' => 'btn btn-link logout text-decoration-none']
                                )
                                . Html::endForm();



                            ?>
                        </div>
                    </li>

                </ul>

            </nav>


            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>

                <!-- Page Heading -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>



</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();

?>





