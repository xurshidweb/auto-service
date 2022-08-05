<?php

use common\models\Comments;
use common\models\Products;
use frontend\components\Cart;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;


?>
<!-- <div class="product-single"> -->
<div role="main" class="main shop pt-4">

    <div class="container">
        <div class="row">
            <div class="col-md-5 mb-5 mb-md-0">

                <div class="thumb-gallery-wrapper">
                    <div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
                        <?php foreach ($products->getBehavior('galleryBehavior')->getImages() as $product) : ?>
                            <div>
                                <img alt="" class="img-fluid" src="<?= $product->getUrl('medium') ?>" data-zoom-image="<?= $product->getUrl('medium') ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
                        <?php foreach ($products->getBehavior('galleryBehavior')->getImages() as $product) : ?>
                            <div class="cur-pointer">
                                <img alt="" class="img-fluid" src="<?= $product->getUrl('small') ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="col-md-7">

                <div class="summary entry-summary position-relative">

                    <h1 class="mb-0 font-weight-bold text-7"><?= $products->name ?></h1>

                    <div class="pb-0 clearfix d-flex align-items-center">
                        <div title="Rated 3 out of 5" class="float-start">
                            <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                        </div>

                        <div class="review-num">
                            <a href="#description" class="text-decoration-none text-color-default text-color-hover-primary" data-hash data-hash-offset="0" data-hash-offset-lg="75" data-hash-trigger-click=".nav-link-reviews" data-hash-trigger-click-delay="1000">
                                <span class="count text-color-inherit" itemprop="ratingCount">(<?= $products->getCommentsCount() ?> </span> <?= Yii::t('app', 'reviews') ?>)
                            </a>
                        </div>
                    </div>

                    <div class="divider divider-small">
                        <hr class="bg-color-grey-scale-4">
                    </div>

                    <p class="price mb-3">
                        <span class="sale text-color-dark">$<?= $products->newcost ?></span>
                        <span class="amount">$<?= $products->oldcost ?></span>
                    </p>

                    <p class="text-3-5 mb-3"><?= $products->content ?></p>

                    <div class="d-flex align-items-center">
                        <ul class="social-icons social-icons-medium social-icons-clean-with-border social-icons-clean-with-border-border-grey social-icons-clean-with-border-icon-dark me-3 mb-0">
                            <!-- Facebook -->
                            <li class="social-icons-facebook">
                                <a href="https://www.facebook.com/sharer.php?u=https://www.okler.net" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <!-- Google+ -->
                            <li class="social-icons-googleplus">
                                <a href="https://plus.google.com/share?url=https://www.okler.net" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Google+">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <!-- Twitter -->
                            <li class="social-icons-twitter">
                                <a href="https://twitter.com/share?url=https://www.okler.net&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <!-- Email -->
                            <li class="social-icons-email">
                                <a href="https://www.okler.net/cdn-cgi/l/email-protection#08375b7d6a626d6b7c355b60697a6d285c60617b2858696f6d2e696578334a676c7135412d3a387b697f2d3a387c60617b2d3a3869666c2d3a387c60677d6f607c2d3a38676e2d3a3871677d292d3a3828607c7c787b3227277f7f7f266763646d7a26666d7c" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share By Email">
                                    <i class="far fa-envelope"></i>
                                </a>
                            </li>
                            <a href="<?= Url::to(['site/add-to-cart', 'id' => $products->id]) ?>" id="addToCart" style="margin-left: 40px;" class="btn btn-dark btn-modern text-uppercase bg-color-hover-primary border-color-hover-primary"><?= Yii::t('app', 'addToCart') ?></a>
                        </ul>
                    </div>

                </div>

            </div>
        </div>

        <hr class="my-5">
    </div>

</div>

<!-- </div> -->