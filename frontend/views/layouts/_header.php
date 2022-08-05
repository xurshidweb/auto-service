<?php

use common\models\Navbar;
use common\models\Phone;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use frontend\components\Cart;

$products = Cart::products();
$navbarMenu = Navbar::find()->orderBy(['id' => SORT_DESC])->one();




?>


<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 54, 'stickySetTop': '-54px', 'stickyChangeLogo': false}">
    <div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
        <div class="header-top header-top-small-minheight header-top-simple-border-bottom">
            <div class="container py-2">
                <div class="header-row justify-content-between">
                    <div class="header-column col-auto px-0">
                        <div class="header-row">
                            <div class="header-nav-top">
                                <ul class="nav nav-pills position-relative">
                                    <li class="nav-item d-none d-sm-block">
                                        <span class="d-flex align-items-center font-weight-medium ws-nowrap text-3 ps-0"><a href="mailto:ermaxamatovx@gmail.com" class="text-decoration-none text-color-dark text-color-hover-primary"><i class="icons icon-envelope font-weight-bold position-relative text-4 top-3 me-1"></i>
                                                <span class="__cf_email__" data-cfemail="5b2b34292f">[<?= Yii::t('app', 'emailProtected') ?>]</span></a></span>
                                    </li>
                                    <li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
                                        <span class="d-flex align-items-center font-weight-medium text-color-dark ws-nowrap text-3"><i class="icons icon-clock font-weight-bold position-relative text-3 top-1 me-2"></i>
                                            <?= Yii::t('app', 'workingDay') ?> 9:00 - 6:00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="header-column justify-content-end col-auto px-0 d-none d-md-flex">
                        <div class="header-row">
                            <nav class="header-nav-top collapse">
                                <ul class="header-social-icons social-icons social-icons-clean social-icons-icon-gray social-icons-medium custom-social-icons-divider">
                                    <?php $url = Yii::$app->urlManager->createAbsoluteUrl(Url::current()) ?>
                                    <li class="social-icons-facebook">
                                        <a href="https://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="social-icons-twitter">
                                        <a href=https://twitter.com/intent/tweet?url=<?= $url ?>" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="social-icons-linkedin">
                                        <a href="https://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>

                                <!-- <ul> -->
                                <li class="nav-link">
                                    <?php
                                    if (Yii::$app->user->isGuest) {
                                        echo "<div style='display: flex; justfy-content: space-around;'><a class='nav-link btn btn-sm' style='padding: 9px !important; color:gray;font-size:17px; font-weight: 700;' href=" . Url::to(['site/login']) . ">" . Yii::t('app', 'login') . "</a><a class='nav-link btn btn-sm' style='padding: 9px !important; color:gray;font-size:17px; font-weight: 700;' href=" . Url::to(['site/signup']) . "> " . Yii::t('app', 'signup') . "</a></div>";
                                    } else {
                                        echo
                                        Html::beginForm(['site/logout'], 'post', ['class' => 'nav-link',])
                                            . Html::submitButton(
                                                'Chiqish (' . Yii::$app->user->identity->username . ')',
                                                ['class' => 'btn btn-link logout nav-link', 'style' => 'text-decoration: none; color: #000; font-weight: 700;color:gray;font-size:17px;']
                                            )
                                            . Html::endForm();
                                    }
                                    ?>
                                </li>
                                <!-- </ul> -->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column w-100">
                    <div class="header-row justify-content-between">
                        <div class="header-logo z-index-2 col-lg-2 px-0">
                            <a href="<?= Url::to(['site/index']) ?>">
                                <img alt="Porto" width="123" height="48" data-sticky-width="82" data-sticky-height="40" data-sticky-top="84" src="<?= Url::base() ?>/img/demos/auto-services/logo.png">
                            </a>
                        </div>
                        <div class="header-nav header-nav-links justify-content-end pe-lg-4 me-lg-3">
                            <div class="header-nav-main header-nav-main-arrows header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">

                                        <li>
                                            <a href="<?= Url::to(['site/index']) ?>" class="nav-link <?= Yii::$app->controller->route == 'site/index' ? 'active' : '' ?>"><?= $navbarMenu->home ?></a>
                                        </li>
                                        <li>
                                            <a href="<?= Url::to(['about/index']) ?>" class="nav-link <?= Yii::$app->controller->route == 'about/index' ? 'active' : 'salom' ?>"><?= $navbarMenu->about ?></a>
                                        </li>
                                        <li>
                                            <a href="<?= Url::to(['services/index']) ?>" class="nav-link  <?= Yii::$app->controller->route == 'services/index' ? 'active' : 'salom' ?>"><?= $navbarMenu->services ?></a>
                                        </li>
                                        <li><a href="<?= Url::to(['product/index']) ?>" class="nav-link  <?= Yii::$app->controller->route == 'product/index' ? 'active' : 'salom' ?>"><?= $navbarMenu->products ?></a></li>
                                        <li><a href="<?= Url::to(['blog/index']) ?>" class="nav-link <?= Yii::$app->controller->route == 'blog/index' ? 'active' : 'salom' ?>"><?= $navbarMenu->blog ?></a>
                                        </li>
                                        <li><a href="<?= Url::to(['appointment/index']) ?>" class="nav-link <?= Yii::$app->controller->route == 'appointment/index' ? 'active' : 'salom' ?>"><?= $navbarMenu->appointment ?></a></li>
                                        <li><a href="<?= Url::to(['contact/index']) ?>" class="nav-link <?= Yii::$app->controller->route == 'contact/index' ? 'active' : 'salom' ?>"><?= $navbarMenu->contact ?></a></li>
                                        <li class="dropdown">
                                            <a href="<?= Url::to(['services/index']) ?>" class="nav-link dropdown-toggle">Lang</a>
                                            <ul class="dropdown-menu">
                                                <?php foreach (Yii::$app->params['language'] as $k => $val) : ?>
                                                    <li><a href="<?= Url::to(['site/chang-lang', 'lang' => $k]); ?>" class="dropdown-item"><?= $val; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>

                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="d-flex col-auto pe-0 ps-0 ps-xl-3">
                            <div class="header-nav-features ps-0 ms-1">
                                <div class="header-nav-feature header-nav-features-search d-inline-flex position-relative top-3 border border-top-0 border-bottom-0 custom-remove-mobile-border-left px-4 me-2">
                                    <a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch">
                                        <i class="icons icon-magnifier header-nav-top-icon text-5 font-weight-bold position-relative top-3"></i>
                                    </a>
                                    <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed border-radius-0" id="headerTopSearchDropdown">
                                        <?= $this->render('_search'); ?>
                                    </div>
                                </div>
                                <div class="item header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex top-2 ms-2">
                                    <a href="#" class="header-nav-features-toggle">
                                        <img src="<?= Url::base() ?>/img/icons/icon-cart-big.svg" height="30" alt="" class="header-nav-top-icon-img">
                                        <span class="cart-info">
                                            <span class="cart-qty shopping-cart"><?= \frontend\components\Cart::allcount(); ?> </span>
                                        </span>
                                    </a>
                                    <div class="header-nav-features-dropdown" id="headerTopCartDropdown">
                                        <?= $this->render('_header_cart'); ?>
                                    </div>
                                </div>
                                <!-- <i class="fas fa-bars add-to-cart" style="cursor: pointer;"></i> -->
                            </div>
                        </div>
                        <button class="btn header-btn-collapse-nav ms-4" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                            <i class="fas fa-bars  add-to-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>