<?php

use yii\helpers\Url;
use frontend\components\Cart;

$products = Cart::products();
?>

<div id="mydiv">
    <?php if (!Yii::$app->user->isGuest && !empty($products)) : ?>
        <ol class="mini-products-list">
            <?php foreach ($products as $k => $value) : ?>
                <li class="item">
                    <a href="#" title="Product Short Name" class="product-image"><img src="<?= $value->image(); ?>" alt="Product Short Name"></a>
                    <div class="product-details">
                        <p class="product-name">
                            <a href="<?= Url::to(['quick-view/index', 'id' => $value->id]) ?>">Product Short Name </a>
                        </p>
                        <p class="qty-price">
                            <?= Cart::count($value->id); ?>X <span class="price">$<?= $value->newcost; ?>=$<?= Cart::count($value->id) * $value->newcost; ?></span>
                        </p>
                        <a href="<?= Url::to(['site/delete', 'id' => $value->id]); ?>" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
                    </div>
                </li>
                <?php $sum += Cart::count($value->id) * $value->newcost; ?>
            <?php endforeach; ?>
        </ol>
        <div class="totals">
            <span class="label">Total:</span>
            <span class="price-total"><span class="price">$<?= $sum; ?></span></span>
        </div>
        <div class="actions">
            <a class="btn btn-dark" href="<?= Url::to(['shopping-cart/index']) ?>">View Cart</a>
            <a class="btn btn-primary" href="<?= Url::to(['checkout/index']) ?>">Checkout</a>
        </div>
    <?php elseif (!Yii::$app->user->isGuest && empty($products)) : ?>
        <b style="margin-left: 90px;color:red;">Empty Cart</b>
        <a class="btn btn-light" style="margin-left: 77px;" href="<?= Url::to(['product/index']) ?>">Xarid qilish</a>
    <?php endif; ?>


    <?php if (Yii::$app->user->isGuest && !empty($products)) : ?>
        <ol class="mini-products-list">
            <?php foreach ($products as $k => $value) : ?>
                <li class="item">
                    <a href="#" title="Product Short Name" class="product-image"><img src="<?= $value->image(); ?>" alt="Product Short Name"></a>
                    <div class="product-details">
                        <p class="product-name">
                            <a href="<?= Url::to(['quick-view/index', 'id' => $value->id]) ?>">Product Short Name </a>
                        </p>
                        <p class="qty-price">
                            <?= Cart::count($value->id); ?>X <span class="price">$<?= $value->newcost; ?>=$<?= Cart::count($value->id) * $value->newcost; ?></span>
                        </p>
                        <a href="<?= Url::to(['site/delete', 'id' => $value->id]); ?>" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
                    </div>
                </li>
                <?php $sum += Cart::count($value->id) * $value->newcost; ?>
            <?php endforeach; ?>
        </ol>
        <div class="totals">
            <span class="label">Total:</span>
            <span class="price-total"><span class="price">$<?= $sum; ?></span></span>
        </div>
        <div class="actions">
            <a class="btn btn-dark" href="<?= Url::to(['shopping-cart/index']) ?>">View Cart</a>
            <a class="btn btn-primary" href="<?= Url::to(['checkout/index']) ?>">Checkout</a>
        </div>
    <?php elseif (Yii::$app->user->isGuest && empty($products)) : ?>
        <b style="margin-left: 90px;color:red;">Empty Cart</b>
        <a class="btn btn-light" style="margin-left: 77px;" href="<?= Url::to(['product/index']) ?>">Xarid qilish</a>
    <?php endif; ?>
</div>