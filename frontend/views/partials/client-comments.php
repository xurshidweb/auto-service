<?php

use common\models\Clients;

$clients = Clients::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();
?>

<section class="section border-0 m-0">
    <div class="container pb-3 my-5">
        <div class="row justify-content-center pb-3 mb-4">
            <div class="col text-center">
                <div class="overflow-hidden">
                    <h2 class="font-weight-bold text-color-dark line-height-3 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250"><?= Yii::t('app', 'clients') ?></h2>
                </div>
                <div class="d-inline-block custom-divider divider divider-primary divider-small my-3">
                    <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim" data-appear-animation-delay="600">
                </div>
                <p class="font-weight-bold text-3-5 mb-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="500"><?= Yii::t('app', 'mativ') ?></p>
                <p class="font-weight-light text-3-5 mb-0"><?= Yii::t('app', 'ourCustomers') ?>
                </p>
            </div>
        </div>
        <div class="row appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="1000">
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