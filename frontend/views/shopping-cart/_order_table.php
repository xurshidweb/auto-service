<?php

use common\models\Products;
use frontend\components\Cart;
use yii\helpers\Url;
?>
<span class="my-order-table" id="order-table">
    <div class="row">
        <div class="col">
            <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
                <li class="text-transform-none me-2">
                    <a href="<?= Url::to(['shopping-cart/index']) ?>" class="text-decoration-none text-color-primary">Shopping Cart</a>
                </li>
                <?php if (Yii::$app->user->isGuest) : ?>
                    <li class="text-transform-none text-color-grey-lighten me-2">
                        <a href="<?= Url::to(['checkout/index']) ?>" style="pointer-events: none;cursor:pointer;" class="text-decoration-none text-color-grey-lighten text-color-hover-primary">Checkout</a>
                    </li>
                <?php elseif (!Yii::$app->user->isGuest && !empty($products)) : ?>
                    <li class="text-transform-none text-color-grey-lighten me-2">
                        <a href="<?= Url::to(['checkout/index']) ?>" class="text-decoration-none text-color-grey-lighten text-color-hover-primary">Checkout</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
    <div class="row pb-4 mb-5">
        <div class="col-lg-8 mb-5 mb-lg-0">
            <form method="post">
                <div class="table-responsive">
                    <table class="shop_table cart">
                        <thead>
                            <tr class="text-color-dark">
                                <th class="product-thumbnail" width="15%">
                                    &nbsp;
                                </th>
                                <th class="product-name text-uppercase" width="30%">
                                    <?= Yii::t('app', 'product') ?>
                                </th>
                                <th class="product-price text-uppercase" width="15%">
                                    <?= Yii::t('app', 'price') ?>
                                </th>
                                <th class="product-quantity text-uppercase" width="20%">
                                    <?= Yii::t('app', 'quantity') ?>
                                </th>
                                <th class="product-subtotal text-uppercase text-end" width="20%">
                                    <?= Yii::t('app', 'subtotal') ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($products)) : ?>
                                <?php foreach ($products as $product) : ?>
                                    <tr class="cart_table_item">
                                        <td class="product-thumbnail">
                                            <div class="product-thumbnail-wrapper">
                                                <a href="<?= Url::to(['site/delete', 'id' => $product->id]) ?>" class="btn-remove product-thumbnail-remove" title="Remove Product">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                <a href="<?= Url::to(['quick-view/index', 'id' => $product->id]) ?>" class="product-thumbnail-image" title="Photo Camera">
                                                    <img width="90" height="90" alt="" class="img-fluid" src="<?= $product->image() ?>">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a href="<?= Url::to(['quick-view/index', 'id' => $product->id]) ?>" class="font-weight-semi-bold text-color-dark text-color-hover-primary text-decoration-none"><?= $product->name ?></a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount font-weight-medium text-color-grey">$<?= $product->newcost ?></span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="quantity float-none m-0">
                                                <a href="<?= Url::to(['site/minus-product', 'id' => $product->id]) ?>" style="cursor: pointer;padding: 10px;" id="product-minus" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary"><i class="fas fa-minus"></i></a>
                                                <input id="count" type="text" disabled class="input-text qty text kkk" value="<?= Cart::count($product->id) ?>" name="quantity">
                                                <a href="<?= Url::to(['site/plus-product', 'id' => $product->id]) ?>" id="productPlus" style="cursor: pointer;padding: 10px;" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </td>
                                        <?php $sum += Cart::count($product->id) * $product->newcost ?>
                                        <td class="product-subtotal text-end sum_product_one product_one">
                                            <span class="amount text-color-dark font-weight-bold text-4 amount_one">$<?= Cart::count($product->id) * $product->newcost ?></span>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
                <?php if (empty($products)) : ?>
                    <h3 class="alert alert-danger">Empty your cart</h3>
                <?php endif ?>
            </form>
        </div>
        <div class="col-lg-4 position-relative">
            <div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
                <div class="card-body">
                    <h4 class="font-weight-bold text-uppercase text-4 mb-3"><?= Yii::t('app', 'cartTotals') ?></h4>
                    <table class="shop_table cart-totals mb-4">
                        <tbody>
                            <tr class="cart-subtotal">
                                <td class="border-top-0">
                                    <strong class="text-color-dark"><?= Yii::t('app', 'subtotal') ?></strong>
                                </td>
                                <td class="border-top-0 text-end">
                                    <strong> $ <span class="amount font-weight-medium" id="summa"><?= $sum ?></span></strong>
                                </td>
                            </tr>
                            <tr class="shipping">
                                <td colspan="2">
                                    <strong class="d-block text-color-dark mb-2"><?= Yii::t('app', 'shipping') ?></strong>

                                    <div class="d-flex flex-column">
                                        <label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method1">
                                            <input id="shipping_method1" type="radio" class="me-2 radio_val" name="shipping_method" value="0" checked />
                                            <?= Yii::t('app', 'freeShipping') ?>
                                        </label>
                                        <label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method2">
                                            <input id="shipping_method2" type="radio" class="me-2 radio_val" name="shipping_method" value="3" />
                                            <?= Yii::t('app', 'localPickup') ?>
                                        </label>
                                        <label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method3">
                                            <input id="shipping_method3" type="radio" class="me-2 radio_val" name="shipping_method" value="5" />
                                            <?= Yii::t('app', 'flatRate') ?>: $5.00
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="total">
                                <td>
                                    <strong class="text-color-dark text-3-5"><?= Yii::t('app', 'total') ?></strong>
                                </td>
                                <td class="text-end">
                                    <strong class="text-color-dark">$ <span class="amount text-color-dark text-5 sum-total" id="sum_total"><?= $sum ?></span></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <a href="<?= Url::to(['checkout/index']) ?>" class="btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3"><?= Yii::t('app', 'proceedCheck') ?> <i class="fas fa-arrow-right ms-2"></i></a>
                    <?php else : ?>
                        <div style="display: flex;gap:1rem;width:500px;">
                            <a href="<?= Url::to(['site/signup']) ?>" class="btn btn-primary"><?= Yii::t('app', 'signup') ?> <i class="fas fa-arrow-right ms-2"></i></a>
                            <a href="<?= Url::to(['site/login']) ?>" class="btn btn-primary	"><?= Yii::t('app', 'login') ?> <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</span>