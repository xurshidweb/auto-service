<?php

use common\models\Products;
use frontend\components\Cart;
use yii\helpers\Url;

// $products = Cart::products();
$relatedProducts = Products::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(7)->all();
?>


<div class="related-product">
    <div class="row">
        <div class="col">
            <h4 class="font-weight-semibold text-4 mb-3"><?= Yii::t('app', 'relatedProducts') ?></h4>
            <hr class="mt-0">
            <div class="products row">
                <div class="col">
                    <div class="owl-carousel owl-theme nav-style-1 nav-outside nav-outside nav-dark mb-0" data-plugin-options="{'loop': false, 'autoplay': false, 'items': 4, 'nav': true, 'dots': false, 'margin': 20, 'autoplayHoverPause': true, 'autoHeight': true, 'stagePadding': '75', 'navVerticalOffset': '50px'}">
                        <?php foreach ($relatedProducts as $relatedProduct) : ?>
                            <div class="product mb-0">
                                <div class="product-thumb-info border-0 mb-3">
                                    <div class="product-thumb-info-badges-wrapper">
                                        <?php
                                        if ($relatedProduct->check == 1) {
                                        ?>
                                            <span class="badge badge-ecommerce badge-success">Yangi</span>
                                        <?
                                        }
                                        ?>
                                        <?php if (!empty($relatedProduct->discount)) : ?>
                                            <span class="badge badge-ecommerce badge-danger"><?= $relatedProduct->discount ?>% <?= Yii::t('app', 'off') ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="addtocart-btn-wrapper">
                                        <a href="<?= Url::to(['site/add-to-cart', 'id' => $relatedProduct->id]) ?>" id="addToCart" class="text-decoration-none addtocart-btn" title="Add to Cart">
                                            <i class="icons icon-bag"></i>
                                        </a>
                                    </div>

                                    <a href="<?= Url::to(['quick-view/index', 'id' => $relatedProduct->id]) ?>" class="quick-view text-uppercase font-weight-semibold text-2">
                                        <?= Yii::t('app', 'viewAll') ?>
                                    </a>
                                    <a href="<?= Url::to(['quick-view/index', 'id' => $relatedProduct->id]) ?>">
                                        <div class="product-thumb-info-image product-thumb-info-image-effect">
                                            <img alt="" class="img-fluid" src="<?= $relatedProduct->image() ?? '' ?>">

                                            <img alt="" class="img-fluid" src="<?= $relatedProduct->image() ?? '' ?>">

                                        </div>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="<?= Url::to(['quick-view/index', 'id' => $relatedProduct->id]) ?>" class="text-color-dark text-color-hover-primary"><?= $relatedProduct->name ?></a></h3>
                                    </div>
                                </div>
                                <div title="Rated 5 out of 5">
                                    <input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
                                </div>
                                <p class="price text-5 mb-3">
                                    <span class="sale text-color-dark font-weight-semi-bold">$<?= $relatedProduct->oldcost ?></span>
                                    <span class="amount">$<?= $relatedProduct->newcost ?></span>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>