<?php

use frontend\components\Cart;
use yii\helpers\Url;

?>
<div role="main" class="main shop pb-4">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 justify-content-center my-5">
                    <li class="text-transform-none me-2">
                        <a href="<?= Url::to(['shopping-cart/index']) ?>" class="text-decoration-none text-color-dark text-color-hover-primary"><?= Yii::t('app', 'shoppingCart') ?></a>
                    </li>
                    <li class="text-transform-none text-color-dark me-2">
                        <a href="<?= Url::to(['checkout/index']) ?>" class="text-decoration-none text-color-dark text-color-hover-primary"><?= Yii::t('app', 'checkout') ?></a>
                    </li>
                    <li class="text-transform-none text-color-dark">
                        <a href="<?= Url::to(['order/index']) ?>" class="text-decoration-none text-color-primary"><?= Yii::t('app', 'orderComplate') ?></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-width-3 border-radius-0 border-color-success">
                    <div class="card-body text-center">
                        <p class="text-color-dark font-weight-bold text-4-5 mb-0"><i class="fas fa-check text-color-success me-1"></i><?= Yii::t('app', 'thankYou') ?></p>
                    </div>
                </div>
                <div class="card border-width-3 border-radius-0 border-color-hover-dark mb-4">
                    <div class="card-body">
                        <h4 class="font-weight-bold text-uppercase text-4 mb-3"><?= Yii::t('app', 'yourOrder') ?></h4>
                        <table class="shop_table cart-totals mb-0">
                            <tbody>
                                <tr>
                                    <td colspan="2" class="border-top-0">
                                        <strong class="text-color-dark"><?= Yii::t('app', 'product') ?></strong>
                                    </td>
                                </tr>
                                <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td>
                                            <strong class="d-block text-color-dark line-height-1 font-weight-semibold"><?= $product->name ?><span class="product-qty"> x<?= Cart::count($product->id) ?></span></strong>
                                        </td>
                                        <td class="text-end align-top">
                                            <span class="amount font-weight-medium text-color-grey">$<?= Cart::count($product->id) * $product->newcost ?></span>
                                        </td>
                                    </tr>
                                    <?php $sum += Cart::count($product->id) * $product->newcost ?>
                                <?php endforeach; ?>
                                <tr class="cart-subtotal">
                                    <td class="border-top-0">
                                        <strong class="text-color-dark"><?= Yii::t('app', 'subtotal') ?></strong>
                                    </td>
                                    <td class="border-top-0 text-end">
                                        <strong><span class="amount font-weight-medium">$<?= $sum ?>,00</span></strong>
                                    </td>
                                </tr>
                                <tr class="shipping">
                                    <td class="border-top-0">
                                        <strong class="text-color-dark"><?= Yii::t('app', 'shipping') ?></strong>
                                    </td>
                                    <td class="border-top-0 text-end">
                                        <strong><span class="amount font-weight-medium"><?= Yii::t('app', 'freeShipping') ?></span></strong>
                                    </td>
                                </tr>
                                <tr class="total">
                                    <td>
                                        <strong class="text-color-dark text-3-5"><?= Yii::t('app', 'total') ?></strong>
                                    </td>
                                    <td class="text-end">
                                        <strong class="text-color-dark"><span class="amount text-color-dark text-5">$<?= $sum ?>,00</span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-lg-6" style="margin-left: 260px;">
                        <a href="<?= Url::to(['product/index']) ?> <?= Yii::$app->session->removeAll('cart') ?>" style="padding:.8rem;font-size:.9rem;" class="btn btn-success">Mahsulotlar bo'limiga qaytish</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>