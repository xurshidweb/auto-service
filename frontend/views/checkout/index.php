<?php

use Codeception\Util\Uri;
use common\models\Districts;
use common\models\Quarters;
use common\models\Regions;
use frontend\components\Cart;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;


?>
<div role="main" class="main shop pb-4">

    <div class="container">

        <div class="row">
            <div class="col">
                <ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 justify-content-center my-5">
                    <li class="text-transform-none me-2">
                        <a href="<?= Url::to(['shopping-cart/index']) ?>" class="text-decoration-none text-color-dark text-color-hover-primary"><?= Yii::t('app', 'shoppingCart') ?></a>
                    </li>
                    <li class="text-transform-none text-color-dark me-2">
                        <a href="<?= Url::to(['checkout/index']) ?>" class="text-decoration-none text-color-primary"><?= Yii::t('app', 'checkout') ?></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col">
                <p class="mb-1">Returning customer? <a href="#" class="text-color-dark text-color-hover-primary text-uppercase text-decoration-none font-weight-bold" data-bs-toggle="collapse" data-bs-target=".login-form-wrapper">Login</a></p>
            </div>
        </div> -->

        <!-- <div class="row login-form-wrapper collapse mb-5">
            <div class="col">
                <div class="card border-width-3 border-radius-0 border-color-hover-dark">
                    <div class="card-body">
                        <form action="https://www.okler.net/" id="frmSignIn" method="post">
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Email address <span class="text-color-danger">*</span></label>
                                    <input type="text" value="" class="form-control form-control-lg text-4" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label text-color-dark text-3">Password <span class="text-color-danger">*</span></label>
                                    <input type="password" value="" class="form-control form-control-lg text-4" required>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="form-group col-md-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="rememberme">
                                        <label class="form-label custom-control-label cur-pointer text-2" for="rememberme">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-auto">
                                    <a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="#">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Login</button>
                                    <div class="divider">
                                        <span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">or</span>
                                    </div>
                                    <a href="#" class="btn btn-primary-scale-2 btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading..."><i class="fab fa-facebook text-5 me-2"></i> Login With Facebook</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="row coupon-form-wrapper collapse mb-5">
            <div class="col">
                <div class="card border-width-3 border-radius-0 border-color-hover-dark">
                    <div class="card-body">
                        <form role="form" method="post" action="#">
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control h-auto border-radius-0 line-height-1 py-3" name="couponCode" placeholder="Coupon Code" required />
                                <button type="submit" class="btn btn-light btn-modern text-color-dark bg-color-light-scale-2 text-color-hover-light bg-color-hover-primary text-uppercase text-3 font-weight-bold border-0 border-radius-0 ws-nowrap btn-px-4 py-3 ms-2">Apply Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <form role="form" class="needs-validation" method="post" action="#"> -->
        <?php $form = ActiveForm::begin(
            [
                'options' => ['class' => 'needs-validation'],
                'action' => ['site/save-db']
            ]
        ) ?>
        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">

                <h2 class="text-color-dark font-weight-bold text-5-5 mb-3"><?= Yii::t('app', 'billingDetails') ?></h2>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label"><?= Yii::t('app', 'name') ?> <span class="text-color-danger">*</span></label>
                        <?= $form->field($orderProducts, 'first_name')->textInput(['class' => 'form-control h-auto py-2'])->label(false) ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label"><?= Yii::t('app', 'familiy') ?> <span class="text-color-danger">*</span></label>
                        <?= $form->field($orderProducts, 'last_name')->textInput(['class' => 'form-control h-auto py-2'])->label(false) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label"><?= Yii::t('app', 'region') ?><span class="text-color-danger">*</span></label>
                        <div class="custom-select-1">
                            <?= $form->field($orderProducts, 'region')->dropDownList(
                                ArrayHelper::map(Regions::find()->all(), 'id', 'name_uz'),
                                ['prompt' => 'Viloyatni tanlang', 'style' => 'height: 55px !important; color: #9C9C9C; font-weight: 100;']
                            )->label(false); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label class="form-label"><?= Yii::t('app', 'district') ?><span class="text-color-danger">*</span></label>
                        <div class="custom-select-1">
                            <?= $form->field($orderProducts, 'district')->dropdownList(ArrayHelper::map(Districts::find()->all(), 'id', 'name_uz'), ['prompt' => 'Tumani tanlang ..', 'style' => 'height: 55px !important; color: #9C9C9C; font-weight: 100;'])->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label">MFY <span class="text-color-danger">*</span></label>
                        <div class="custom-select-1">
                            <?= $form->field($orderProducts, 'mfy')->dropdownList(
                                ArrayHelper::map(Quarters::find()->all(), 'id', 'name'),
                                ['prompt' => 'MFY tanlang', 'style' => 'height: 55px !important; color: #9C9C9C; font-weight: 100;']
                            )->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label">Ko'cha va uy raqami <span class="text-color-danger">*</span></label>
                        <?= $form->field($orderProducts, 'street')->textInput(['class' => 'form-control h-auto py-2'])->label(false) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label"><?= Yii::t('app', 'phone') ?> <span class="text-color-danger">*</span></label>
                        <?= $form->field($orderProducts, 'phone')->textInput(['class' => 'form-control h-auto py-2'])->label(false) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label"><?= Yii::t('app', 'email') ?> <span class="text-color-danger">*</span></label>
                        <?= $form->field($orderProducts, 'email')->textInput(['class' => 'form-control h-auto py-2'])->label(false) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label"><?= Yii::t('app', 'message') ?></label>
                        <?= $form->field($orderProducts, 'message')->textarea(['class' => 'form-control h-auto py-2', 'rows' => 5])->label(false) ?>
                    </div>
                </div>


            </div>
            <div class="col-lg-5 position-relative">
                <div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
                    <div class="card-body">
                        <h4 class="font-weight-bold text-uppercase text-4 mb-3"><?= Yii::t('app', 'yourOrder') ?></h4>
                        <table class="shop_table cart-totals mb-3">
                            <tbody>
                                <tr>
                                    <td colspan="2" class="border-top-0">
                                        <strong class="text-color-dark"><?= Yii::t('app', 'product') ?></strong>
                                    </td>
                                </tr>
                                <?php foreach ($products as $k => $product) : ?>
                                    <tr>
                                        <td>
                                            <strong class="d-block text-color-dark line-height-1 font-weight-semibold"><?= $product->name ?> <span class="product-qty">x<?= Cart::count($product->id) ?></span></strong>
                                            <span class="text-1"></span>
                                        </td>
                                        <td class="text-end align-top">
                                            <span class="amount font-weight-medium text-color-grey">$<?= Cart::count($product->id) * $product->newcost; ?></span>
                                        </td>
                                    </tr>

                                    <?php $sum += Cart::count($product->id) * $product->newcost; ?>
                                    <?php $totalProductCount += Cart::count($product->id) ?>
                                <?php endforeach; ?>
                                <tr class="cart-subtotal">
                                    <td class="border-top-0">
                                        <strong class="text-color-dark"><?= Yii::t('app', 'subtotal') ?></strong>
                                    </td>
                                    <td class="border-top-0 text-end">
                                        <strong>$ <span class="amount font-weight-medium" id="summa"><?= $sum ?></span></strong>
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
                                        <strong class="text-color-dark">$<span id="sum_total" class="amount text-color-dark text-5" id="sum_total"><?= $sum ?></span></strong>
                                    </td>
                                </tr>
                                <tr class="payment-methods">
                                    <td colspan="2">
                                        <strong class="d-block text-color-dark mb-2"><?= Yii::t('app', 'paymetMethods') ?></strong>

                                        <div class="d-flex flex-column">
                                            <label class="d-flex align-items-center text-color-grey mb-0" for="payment_method1">
                                                <input id="payment_method1" type="radio" class="me-2" name="payment_method" value="cash-on-delivery" checked />
                                                Cash On Delivery
                                            </label>
                                            <label class="d-flex align-items-center text-color-grey mb-0" for="payment_method2">
                                                <input id="payment_method2" type="radio" class="me-2" name="payment_method" value="paypal" />
                                                PayPal
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?= Yii::t('app', 'personalInformation') ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php if (!Yii::$app->user->isGuest) : ?>
                            <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3"><?= Yii::t('app', 'placeOrder') ?>
                                <i class="fas fa-arrow-right ms-2"></i></button>
                        <?php else : ?>
                            <div style="display: flex;gap:3.4rem;width:500px;">
                                <a href="<?= Url::to(['site/signup']) ?>" class="btn btn-primary" style="padding:.7rem;font-size:1rem;"><?= Yii::t('app', 'signup') ?> <i class="fas fa-arrow-right ms-2"></i></a>
                                <a href="<?= Url::to(['site/login']) ?>" class="btn btn-primary	" style="padding:.7rem;font-size:1rem;"><?= Yii::t('app', 'login') ?> <i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- </form> -->
        <?php ActiveForm::end(); ?>
    </div>

</div>
<?php
$url = Url::to(['site/address']);
$js = <<< JS
$('#orderproduct-region').on('change',function () {
 var region_id=$(this).children("option:selected").val();
  $.ajax({
    url:'/site/address',
    type:'GET',
    data:{region_id:region_id},
    success:function(data){
       $('#orderproduct-district').html('');
       $('#orderproduct-district').html(data);
    }
  })
})

//district
$('#orderproduct-district').on('change',function () {
 var district_id=$(this).children("option:selected").val();
  $.ajax({
    url:'/site/district',
    type:'GET',
    data:{district_id:district_id},
    success:function(data){
       $('#orderproduct-mfy').html('');
       $('#orderproduct-mfy').html(data);
    }
  })
})
JS;
$this->registerJs($js)
?>