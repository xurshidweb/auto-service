<?php

use common\models\Brands;
use common\models\Experience;
use common\models\Images;

$brands = Brands::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();
$experience = Experience::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->one();
$images = Images::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();


?>


<div class="container my-5 pt-4">
    <div class="row align-items-center justify-content-center mb-5">
        <div class="col-lg-6 pb-sm-4 pb-lg-0 mb-5 mb-lg-0">
            <div class="overflow-hidden">
                <h2 class="font-weight-bold text-color-dark line-height-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300"><?= $experience->title ?></h2>
            </div>
            <div class="custom-divider divider divider-primary divider-small my-3">
                <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim" data-appear-animation-delay="700">
            </div>
            <p class="font-weight-light text-3-5 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="450"><?= $experience->content ?></p>
            <div class="row">
                <div class="col-sm-5 col-lg-4 order-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="950">
                    <ul class="list list-icons list-icons-style-2 list-icons-lg mb-0">
                        <?php

                        use yii\helpers\Url;

                        foreach ($brands as $key => $value) : ?>
                            <?php if ($key % 2 == 1) {
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
                <div class="col-sm-5 col-lg-4 order-3 order-lg-2 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="1200">
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
        <div class="col-10 col-md-9 col-lg-6 ps-lg-5 pe-5 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1450" data-plugin-options="{'accY': -200}">
            <div class="position-relative">
                <div data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.2, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}">
                    <img src="<?= $experience->getImageUrl() ?>" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
    <div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
        <div class="row row-gutter-sm mb-4 mb-lg-5">
            <?php foreach ($images as $image) : ?>
                <div class="col-sm-4 mb-4 mb-sm-0 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="250" data-plugin-options="{'accY': -150}">
                    <a class="d-inline-block custom-img-thumbnail-style-1 img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon rounded-0" href="<?= $image->getImageUrl() ?>">
                        <img class="img-fluid rounded-0" src="<?= $image->getImageUrl() ?>" alt="" />
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row pb-4">
        <div class="col-lg-9 col-xl-4-5 mb-4 mb-lg-0">
            <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="1000"><?= Yii::t('app', 'lorem') ?></p>
        </div>
        <div class="col-lg-3 col-xl-1-5">
            <a href="<?= Url::to(['services/index']) ?>" class="btn btn-primary custom-btn-border-radius font-weight-bold text-3 btn-px-5 btn-py-3 w-lg-100pct appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="1250"><?= Yii::t('app', 'ourServices') ?></a>
        </div>
    </div>
</div>