<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;


?>



<div role="main" class="main shop pt-4">

    <div class="container">
        <?= $this->render(
            '_product-one',
            [
                'products' => $products,
                'commentMessages' => $commentMessages,
                'comments' => $comments,
                'relatedProducts' => $relatedProducts,


            ]
        ); ?>
        <div class="row mb-4">
            <div class="col">
                <div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
                    <ul class="nav nav-tabs justify-content-start">
                        <li class="nav-item"><a class="nav-link active font-weight-bold text-3 text-uppercase py-2 px-3" href="#productDescription" data-bs-toggle="tab"> <?= Yii::t('app', 'description') ?></a></li>
                        <li class="nav-item"><a class="nav-link font-weight-bold text-3 text-uppercase py-2 px-3" href="#productInfo" data-bs-toggle="tab"> <?= Yii::t('app', 'additionalInformation') ?></a></li>
                        <li class="nav-item"><a class="nav-link nav-link-reviews font-weight-bold text-3 text-uppercase py-2 px-3" href="#productReviews" data-bs-toggle="tab"> <?= Yii::t('app', 'reviews') ?></a></li>
                    </ul>
                    <div class="tab-content p-0">
                        <div class="tab-pane px-0 py-3 active" id="productDescription">
                            <p><?= $products->content ?></p>
                        </div>
                        <div class="tab-pane px-0 py-3" id="productInfo">
                            <table class="table table-striped m-0">
                                <tbody>
                                    <tr>
                                        <th class="border-top-0">
                                            <?= Yii::t('app', 'productName') ?>:
                                        </th>
                                        <td class="border-top-0">
                                            <?= $products->name ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?= Yii::t('app', 'price') ?>
                                        </th>
                                        <td>
                                            <?= $products->newcost ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?= Yii::t('app', 'producDiscount') ?>
                                        </th>
                                        <td>
                                            <?= $products->discount ?>%
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane px-0 py-3" id="productReviews">
                            <ul class="comments">
                                <?php foreach ($commentMessages as $commentMessage) : ?>
                                    <li>
                                        <div class="comment">
                                            <div class="img-thumbnail border-0 p-0 d-none d-md-block">
                                                <img class="avatar rounded-circle" alt="" src="<?= Url::base() ?>/img/avatars/avatar-2.jpg">
                                            </div>
                                            <div class="comment-block">
                                                <div class="comment-arrow"></div>
                                                <span class="comment-by">
                                                    <strong><?= $commentMessage->name ?></strong>
                                                    <span class="float-end">
                                                        <div class="pb-0 clearfix">
                                                            <div title="Rated 3 out of 5" class="float-start">
                                                                <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                                                            </div>

                                                            <div class="review-num">
                                                                <span class="count" itemprop="ratingCount"><?= $commentMessage->view_count ?></span> <?= Yii::t('app', 'reviews') ?>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </span>
                                                <p><?= $commentMessage->message ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <hr class="solid my-5">
                            <h4><?= Yii::t('app', 'addReview') ?></h4>
                            <div class="row">
                                <div class="col">

                                    <?php $form = ActiveForm::begin(['options' => ['class' => 'custom-form-simple-validation p-4 rounded bg-color-grey']]); ?>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="form-label required font-weight-bold text-dark"><?= Yii::t('app', 'name') ?></label>
                                            <?= $form->field($comments, 'name')->textInput(['class' => 'form-control'])->label(false) ?>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label required font-weight-bold text-dark"><?= Yii::t('app', 'email') ?></label>
                                            <?= $form->field($comments, 'email')->textInput(['class' => 'form-control'])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label required font-weight-bold text-dark"><?= Yii::t('app', 'comments') ?></label>
                                            <?= $form->field($comments, 'message')->textarea(['class' => 'form-control', 'rows' => 8])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col mb-0">
                                            <input type="submit" value="<?= Yii::t('app', 'postComment') ?>" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h4 class="font-weight-semibold text-4 mb-3"> <?= Yii::t('app', 'relatedProducts') ?>
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
                                                    <img alt="" class="img-fluid" src="<?= $relatedProduct->image() ?>">

                                                    <img alt="" class="img-fluid" src="<?= $relatedProduct->image() ?>">

                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0">
                                                    <a href="<?= Url::to(['quick-view/index', 'id' => $relatedProduct->id]) ?>" class="text-color-dark text-color-hover-primary"><?= $relatedProduct->name ?></a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div title="Rated 5 out of 5">
                                            <input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
                                        </div>
                                        <p class="price text-5 mb-3">
                                            <span class="sale text-color-dark font-weight-semi-bold">$<?= $relatedProduct->newcost ?></span>
                                            <span class="amount">$<?= $relatedProduct->oldcost ?></span>
                                        </p>
                                    </div>

                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <hr class="my-5">
    </div>

</div>