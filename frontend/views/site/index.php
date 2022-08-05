<?

use yii\helpers\Url;
?>
<div role="main" class="main">

    <section class="section custom-section-background position-relative border-0 overflow-hidden m-0 p-0">
        <div class="position-absolute top-0 left-0 right-0 bottom-0 animated fadeIn" style="animation-delay: 600ms;">
            <div class="background-image-wrapper custom-background-style-1 position-absolute top-0 left-0 right-0 bottom-0 animated kenBurnsToRight" style="background-image: url(<?= $basics->getImageUrl() ?>); background-position: center right; animation-duration: 30s;">
            </div>
        </div>
        <div class="container position-relative py-sm-5 my-5">
            <svg class="custom-svg-1 d-none d-sm-block" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 649 578">
                <path fill="#FFF" d="M-225.5,154.7l358.45,456.96c7.71,9.83,21.92,11.54,31.75,3.84l456.96-358.45c9.83-7.71,11.54-21.92,3.84-31.75
								L267.05-231.66c-7.71-9.83-21.92-11.54-31.75-3.84l-456.96,358.45C-231.49,130.66-233.2,144.87-225.5,154.7z" />
                <path class="animated customLineAnim" fill="none" stroke="#1C5FA8" stroke-width="1.5" stroke-miterlimit="10" d="M416-21l202.27,292.91c5.42,7.85,3.63,18.59-4.05,24.25L198,603" style="animation-delay: 300ms; animation-duration: 5s;" />
            </svg>
            <div class="row mb-5 p-relative z-index-1">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="overflow-hidden mb-1">
                        <h2 class="font-weight-bold text-color-grey text-4-5 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="800"><?= $basics->title ?></h2>
                    </div>
                    <h1 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100"><?= $basics->content ?></h1>
                    <a href="<?= Url::to(['about/index']) ?>" class="btn btn-primary custom-btn-border-radius custom-btn-arrow-effect-1 font-weight-bold text-3 px-5 btn-py-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300">
                        <?= Yii::t('app', 'viewAll') ?>
                        <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <polygon stroke="#FFF" stroke-width="0.1" fill="#FFF" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section border-0 m-0 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1200">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-9 col-md-12 col-lg-7 text-center text-lg-end mb-4 mb-lg-0">
                    <h2 class="font-weight-bold text-color-primary text-7 line-height-1 mb-1 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="1700">
                        <?= Yii::t('app', 'meeting1') ?></h2>
                    <p class="font-weight-bold text-4 mb-0 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="1900"><?= Yii::t('app', 'meeting2') ?></p>
                </div>
                <div class="col-lg-5 text-center text-lg-start ps-lg-4">
                    <a href="<?= Url::to(['appointment/index']) ?>" class="btn btn-primary btn-outline custom-btn-border-radius font-weight-bold text-3 btn-px-5 btn-py-3 ms-lg-2 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="1500"><?= Yii::t('app', 'makeAppointment') ?></a>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5 pt-md-4 pt-xl-0">
        <div class="row align-items-center justify-content-center pb-4 mb-5">
            <div class="col-lg-6 pb-sm-4 pb-lg-0 mb-5 mb-lg-0">
                <div class="overflow-hidden">
                    <h2 class="font-weight-bold text-color-dark line-height-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300"><?= $experience->title ?></h2>
                </div>
                <div class="custom-divider divider divider-primary divider-small my-3">
                    <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim" data-appear-animation-delay="700">
                </div>
                <p class="font-weight-light text-3-5 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="450"><?= $experience->content ?></p>

                <div class="d-flex align-items-start align-items-sm-center flex-column flex-sm-row">
                    <a href="<?= Url::to(['about/index']) ?>" class="btn btn-primary custom-btn-border-radius font-weight-bold text-3 px-5 btn-py-3 me-sm-2 mb-3 mb-sm-0 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="950"><?= Yii::t('app', 'viewAll') ?></a>
                    <div class="feature-box align-items-center border border-top-0 border-end-0 border-bottom-0 custom-remove-mobile-xs-border-left ms-sm-4 ps-sm-4 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1200">
                        <div class="feature-box-icon bg-transparent">
                            <i class="icons icon-phone text-6 text-color-dark"></i>
                        </div>
                        <div class="feature-box-info line-height-2 ps-1">
                            <span class="d-block text-1 font-weight-semibold text-color-default"><?= $phoneNumber->title ?></span>
                            <strong class="text-4-5"><a href="tel:+998931631070" class="text-color-dark text-color-hover-primary text-decoration-none"><?= $phoneNumber->number ?></a></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-9 col-lg-6 ps-lg-5 pe-5 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1450" data-plugin-options="{'accY': -200}">
                <div class="position-relative">
                    <div data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.2, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}">
                        <img src="<?= $experience->getImageUrl() ?>" class="img-fluid" alt="" />
                    </div>

                </div>
            </div>
        </div>
        <div class="row pb-2">
            <?php foreach ($works as $work) : ?>
                <div class="col-lg-4 text-center px-lg-5 mb-5 mb-lg-0">
                    <a href="<?= Url::to(['services/index']) ?>" class="text-decoration-none">
                        <div class="custom-icon-box-style-1 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="250" data-plugin-options="{'accY': -200}">
                            <div class="custom-icon-style-1 mb-4">
                                <img width="50" src="<?= $work->getImageUrl() ?>" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                            </div>
                            <h3 class="text-transform-none font-weight-bold text-color-dark line-height-3 text-4-5 px-3 px-xl-5 my-2">
                                <?= $work->title  ?></h3>
                            <p><?= substr($work->content, 0, 50) . "..." ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <section class="section custom-bg-color-grey-1 custom-background-size-1 position-relative overflow-hidden border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '130%', 'fadeIn': true}" data-image-src="<?= $brandInfos->getImageUrl() ?>">
        <svg class="custom-svg-background-1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 537" data-appear-animation-svg="true">
            <path fill="#F4F4F4" d="M964.33,189.3L1110.08,0H0v537h1338.31L972.96,255.7C952.24,239.74,948.38,210.02,964.33,189.3z" />
            <path class="appear-animation" data-appear-animation="customLineAnim2" data-appear-animation-delay="500" data-appear-animation-duration="5s" data-plugin-options="{'accY': -400}" fill="none" stroke="#1C5FA8" stroke-width="2" stroke-miterlimit="10" d="M1854.35,105.63l-485.31-340.84c-18.3-12.85-43.56-8.44-56.42,9.86L971.79,259.96
							c-12.85,18.3-8.44,43.56,9.86,56.42l485.31,340.84c18.3,12.85,43.56,8.44,56.42-9.86l340.84-485.31
							C1877.07,143.74,1872.65,118.48,1854.35,105.63z" />
        </svg>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="overflow-hidden">
                        <h2 class="font-weight-bold text-color-dark line-height-3 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250"><?= $brandInfos->title ?></h2>
                    </div>
                    <div class="custom-divider divider divider-primary divider-small pt-1 mb-3 mt-2">
                        <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim" data-appear-animation-delay="600">
                    </div>
                    <p class="font-weight-light text-3-5 pb-3 pe-5 me-md-5 me-lg-4 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500"><?= $brandInfos->content ?></p>
                    <div class="row">
                        <div class="col-5 col-lg-4 order-1 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="750">
                            <ul class="list list-icons list-icons-style-2 list-icons-lg mb-0">
                                <?php foreach ($brands as $key => $value) : ?>
                                    <?php if ($key % 2 == 0) {
                                    ?>
                                        <li class="font-weight-semibold text-color-dark">
                                            <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i>
                                            <?= $value->title ?>
                                        </li>
                                    <?
                                    } ?>

                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-lg-4 order-3 order-lg-2 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1000">
                            <ul class="list list-icons list-icons-style-2 list-icons-lg mb-0">
                                <?php foreach ($brands as $key => $value) : ?>
                                    <?php if ($key % 2 == 0) {
                                    ?>
                                        <li class="font-weight-semibold text-color-dark">
                                            <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i>
                                            <?= $value->title ?>
                                        </li>
                                    <?
                                    } ?>

                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8 text-center">
                <div class="overflow-hidden">
                    <h2 class="font-weight-bold text-color-dark line-height-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250"><?= Yii::t('app', 'autoServices') ?></h2>
                </div>
                <div class="d-inline-block custom-divider divider divider-primary divider-small my-3">
                    <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim" data-appear-animation-delay="600">
                </div>
                <p class="font-weight-light text-3-5 mb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500"><?= Yii::t('app', 'lorem') ?></p>
            </div>
        </div>
        <div class="row row-gutter-sm mb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">
            <?php foreach ($services as $service) : ?>
                <div class="col-sm-6 col-lg-3 text-center mb-4 mb-lg-0">
                    <a href="<?= Url::to(['services/index']) ?>" class="text-decoration-none">
                        <div class="custom-thumb-info-style-1 thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten">
                            <div class="thumb-info-wrapper">
                                <img src="<?= $service->getImageUrl() ?>" class="img-fluid" alt="">
                            </div>
                            <h3 class="text-transform-none font-weight-bold text-5 mt-2 mb-0"><?= substr($service->title, 0, 20) . "..." ?></h3>
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
        <div class="row">
            <div class="col text-center">
                <a href="<?= Url::to(['services/index']) ?>" class="btn btn-primary custom-btn-border-radius font-weight-bold text-3 btn-px-5 btn-py-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="850"><?= Yii::t('app', 'viewAll') ?></a>
            </div>
        </div>
    </div>

    <section class="section border-0 m-0">
        <div class="container pb-3 my-5">
            <div class="row justify-content-center pb-3 mb-4">
                <div class="col text-center">
                    <h2 class="font-weight-bold text-color-dark line-height-1 mb-0"><?= Yii::t('app', 'clients') ?>
                    </h2>
                    <div class="d-inline-block custom-divider divider divider-primary divider-small my-3">
                        <hr class="my-0">
                    </div>
                    <p class="font-weight-bold text-3-5 mb-1"><?= Yii::t('app', 'mativ') ?></p>
                    <p class="font-weight-light text-3-5 mb-0"><?= Yii::t('app', 'ourCustomers') ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="owl-carousel nav-outside nav-style-1 nav-dark nav-arrows-thin nav-font-size-lg custom-carousel-box-shadow-1 mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'autoplay': true, 'autoplayTimeout': 5000, 'autoplayHoverPause': true, 'dots': false, 'nav': true, 'loop': true, 'margin': 15, 'stagePadding': '75'}">
                        <?php foreach ($clients as $client) : ?>
                            <div>
                                <div class="card custom-border-radius-1">
                                    <div class="card-body">
                                        <div class="custom-testimonial-style-1 testimonial testimonial-style-2 testimonial-with-quotes testimonial-remove-right-quote text-center mb-0">
                                            <blockquote>
                                                <p class="text-color-dark text-3 font-weight-light px-0 mb-2"><?= substr($client->content, 0, 300) . "..." ?></p>
                                            </blockquote>
                                            <div class="testimonial-author">
                                                <p><strong class="font-weight-extra-bold"><?= $client->title ?></strong></p>
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
    </section>

    <section class="section section-height-3 bg-primary border-0 m-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-7 text-center text-lg-start mb-4 mb-lg-0">
                    <h2 class="text-color-light font-weight-medium text-3-5 line-height-2 line-height-sm-1 ls-0 mb-2 mb-lg-2"><?= Yii::t('app', 'reliableServices') ?></h2>
                    <h3 class="font-weight-bold text-color-light text-transform-none text-8 line-height-2 line-height-lg-1 mb-1"><?= Yii::t('app', 'avto') ?></h3>
                    <p class="font-weight-bold text-color-light text-4 opacity-7 mb-0"><?= Yii::t('app', 'onlineForm') ?></p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                        <div class="feature-box align-items-center mb-3 mb-lg-0">
                            <div class="feature-box-icon bg-transparent">
                                <i class="icons icon-phone text-6 text-color-light"></i>
                            </div>
                            <div class="feature-box-info line-height-2 ps-1">
                                <span class="d-block text-1 font-weight-semibold text-color-light mb-1"><?= $phoneNumber->title ?></span>
                                <strong class="text-4-5"><a href="tel:+1234567890" class="text-color-light text-decoration-none"><?= $phoneNumber->number ?></a></strong>
                            </div>
                        </div>
                        <a href="<?= Url::to(['appointment/index']) ?>" class="btn btn-light btn-outline custom-btn-border-radius font-weight-bold text-color-light text-color-hover-dark bg-color-hover-light btn-px-5 btn-py-3"><?= Yii::t('app', 'makeAppointment') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($images as $image) : ?>
                    <div class="col-6 col-md-3 px-0">
                        <a class="d-inline-block custom-img-thumbnail-style-1 img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon rounded-0" href="<?= $image->getImageUrl() ?>">
                            <img class="img-fluid rounded-0" src="<?= $image->getImageUrl() ?>" alt="" />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="container py-5 my-5">
        <div class="row justify-content-center pb-3 mb-4">
            <div class="col-lg-9 col-xl-8 text-center">
                <div class="overflow-hidden">
                    <h2 class="font-weight-bold text-color-dark line-height-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250"><?= Yii::t('app', 'frequentlyQuestions') ?></h2>
                </div>
                <div class="d-inline-block custom-divider divider divider-primary divider-small my-3">
                    <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim" data-appear-animation-delay="650">
                </div>
                <p class="font-weight-light text-3-5 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500"><?= Yii::t('app', 'lorem') ?></p>
            </div>
        </div>
        <div class="row row-gutter-sm">
            <div class="col-md-8 col-lg-9 mb-5 mb-md-0">
                <svg class="custom-svg-2 overflow-visible" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 185 151">
                    <g data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.1, 'transition': true, 'transitionDuration': 2000, 'isInsideSVG': true}">
                        <path fill="#F4F4F4" class="appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="850" d="M34.81,102.81L5.18,73.18c-2.13-2.13-2.13-5.59,0-7.72l29.63-29.63c2.13-2.13,5.59-2.13,7.72,0l29.63,29.63
										c2.13,2.13,2.13,5.59,0,7.72l-29.63,29.63C40.4,104.94,36.94,104.94,34.81,102.81z" />
                    </g>
                    <g data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.2, 'transition': true, 'transitionDuration': 2500, 'isInsideSVG': true}">
                        <path fill="#F4F4F4" class="appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="1000" d="M92.49,35.35L80.4,23.26c-1.75-1.75-1.75-4.59,0-6.34L92.49,4.83c1.75-1.75,4.59-1.75,6.34,0l12.09,12.09
										c1.75,1.75,1.75,4.59,0,6.34L98.83,35.35C97.08,37.1,94.24,37.1,92.49,35.35z" />
                    </g>
                    <g data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.3, 'transition': true, 'transitionDuration': 3000, 'isInsideSVG': true}">
                        <path fill="#F4F4F4" class="appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="1150" d="M129.88,148.41l-43.21-43.21c-2.13-2.13-2.13-5.59,0-7.72l43.21-43.21c2.13-2.13,5.59-2.13,7.72,0l43.21,43.21
										c2.13,2.13,2.13,5.59,0,7.72l-43.21,43.21C135.46,150.54,132.01,150.54,129.88,148.41z" />
                    </g>
                </svg>
                <div class="accordion custom-accordion-style-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" id="accordion1">
                    <?php
                    foreach ($questions as $k => $question) :
                    ?>
                        <div class="card card-default">
                            <div class="card-header" id="collapse1Heading<?= $k ?>">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse1<?= $k ?>" aria-expanded="false" aria-controls="collapse1<?= $k ?>">
                                        <?= $question->title ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1<?= $k ?>" class="collapse" aria-labelledby="collapse1Heading<?= $k ?>" data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="mb-0"><?= $question->content ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 text-center text-md-start">
                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
                    <h3 class="font-weight-bold text-color-dark text-transform-none text-5-5 mb-3"><?= Yii::t('app', 'ourMission') ?></h3>
                    <p class="pb-1 mb-2"><?= Yii::t('app', 'littleLorem') ?></p>
                    <a href="<?= Url::to(['about/index']) ?>" class="btn btn-primary custom-btn-border-radius font-weight-bold btn-px-5 py-3 mb-2"><?= Yii::t('app', 'viewAll') ?></a>

                    <hr class="my-4">
                </div>
                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100">
                    <h3 class="font-weight-bold text-color-dark text-transform-none text-5-5 pt-2 mb-3"><?= Yii::t('app', 'anyQuestions') ?></h3>
                    <p class="pb-1 mb-2"><?= Yii::t('app', 'littleLorem') ?></p>
                    <a href="<?= Url::to(['contact/index']) ?>" class="btn btn-primary custom-btn-border-radius font-weight-bold btn-px-5 py-3"><?= Yii::t('app', 'contact') ?></a>
                </div>
            </div>
        </div>
    </div>

    <section class="shop section section-height-4 border-0 m-0">
        <div class="container">
            <div class="row justify-content-center pb-3 mb-4">
                <div class="col-lg-8 text-center">
                    <div class="overflow-hidden">
                        <h2 class="font-weight-bold text-color-dark line-height-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250"><?= Yii::t('app', 'products') ?>
                        </h2>
                    </div>
                    <div class="d-inline-block custom-divider divider divider-primary divider-small my-3">
                        <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim" data-appear-animation-delay="600">
                    </div>
                    <p class="font-weight-light text-3-5 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500"><?= Yii::t('app', 'lorem') ?></p>
                </div>
            </div>
            <div class="products row row-gutter-sm mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">
                <?php foreach ($products as $product) : ?>
                    <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="product mb-0">
                            <div class="product-thumb-info border-0 mb-3">
                                <div class="product-thumb-info-badges-wrapper">
                                    <?php
                                    if ($product->check == 1) {
                                    ?>
                                        <span class="badge badge-ecommerce badge-success">Yangi</span>
                                    <?
                                    }
                                    ?>

                                    <?php if (!empty($product->discount)) : ?>
                                        <span class="badge badge-ecommerce badge-danger"><?= $product->discount ?>% <?= Yii::t('app', 'off') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="addtocart-btn-wrapper">
                                    <a href="<?= Url::to(['site/add-to-cart', 'id' => $product->id]); ?>" id="addToCart" class="text-decoration-none addtocart-btn" title="Add to Cart">
                                        <i class="icons icon-bag"></i>
                                    </a>
                                </div>
                                <a href="<?= Url::to(['quick-view/index', 'id' => $product->id]) ?>" class="quick-view text-uppercase font-weight-semibold text-2">
                                    <?= Yii::t('app', 'viewAll') ?>
                                </a>
                                <a href="<?= Url::to(['quick-view/index', 'id' => $product->id]) ?>">
                                    <div class="product-thumb-info-image bg-light">
                                        <img alt="" class="img-fluid" src="<?= $product->image() ?>">
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0">
                                        <a href="<?= Url::to(['quick-view/index', 'id' => $product->id]) ?>" class="text-color-dark text-color-hover-primary"><?= $product->name ?></a>
                                    </h3>
                                </div>
                            </div>
                            <div title="Rated 5 out of 5">
                                <input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
                            </div>
                            <p class="price text-5 mb-3">
                                <span class="sale text-color-dark font-weight-medium"><?= $product->newcost ?></span>
                                <span class="amount"><?= $product->oldcost ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="<?= Url::to(['product/index']) ?>" class="btn btn-primary custom-btn-border-radius font-weight-bold text-3 btn-px-5 btn-py-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="800"><?= Yii::t('app', 'viewAll') ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-transparent position-relative border-0 z-index-1 m-0 p-0">
        <div class="container py-4">
            <div class="row align-items-center text-center py-5">
                <?php foreach ($brandImages as $brandImage) : ?>
                    <div class="col-sm-4 col-lg-2 mb-5 mb-lg-0">
                        <img src="<?= $brandImage->getImageUrl() ?>" alt class="img-fluid" style="max-width: 90px;" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <svg class="custom-svg-3" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 193 495">
            <path fill="#1C5FA8" d="M193,25.73L18.95,247.93c-13.62,17.39-10.57,42.54,6.82,56.16L193,435.09V25.73z" />
            <path fill="none" stroke="#FFF" stroke-width="1.5" stroke-miterlimit="10" d="M196,53.54L22.68,297.08c-12.81,18-8.6,42.98,9.4,55.79L196,469.53V53.54z" />
        </svg>
    </section>

</div>