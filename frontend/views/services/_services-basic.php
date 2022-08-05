<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Url;

?>
<div class="container py-4 my-5">
    <div class="row mb-4 pb-2">
        <div class="col">
            <p class="text-4 font-weight-semibold mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300"><?= Yii::t('app', 'getReliable') ?> </p>
            <p class="pb-1 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500"><?= Yii::t('app', 'lorem') ?> </p>
            <p class="mb-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700"><?= Yii::t('app', 'littleLorem') ?> </p>
        </div>
    </div>
    <div class="row row-gutter-sm mb-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="950">
        <?php
        foreach ($services as $service) : ?>
            <div class="col-sm-6 col-lg-3 text-center">
                <a href="<?= Url::to(['site/detail', 'id' => $service->id]) ?>" class="text-decoration-none">
                    <div class="custom-thumb-info-style-1 thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten">
                        <div class="thumb-info-wrapper">
                            <img src="<?= $service->getImageUrl() ?>" class="img-fluid" alt="">
                        </div>
                        <h3 class="text-transform-none font-weight-bold text-5 mt-2 mb-0"><?= $service->title ?></h3>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <ul class="custom-pagination-style-1 pagination pagination-rounded pagination-md justify-content-center">
        <?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>
    </ul>
</div>