<?php

use common\models\Messages;

$messages = new Messages();



?>

<div class="container py-4 my-5">
    <div class="row align-items-center">
        <div class="col-lg-5 col-xl-4 offset-xl-1 mb-5 mb-lg-0">
            <div class="overflow-hidden">
                <h2 class="text-color-dark font-weight-bold line-height-3 text-5-5 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250"><?= Yii::t('app', 'addressFull') ?></h2>
            </div>
            <div class="overflow-hidden">
                <a href="" data-hash data-hash-offset="0" data-hash-offset-lg="100" class="d-inline-block custom-text-underline-1 font-weight-bold border-color-primary text-decoration-none text-3-5 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500"> <?= Yii::t('app', 'getDirection') ?></a>
            </div>
            <ul class="list list-unstyled text-color-dark font-weight-bold text-4 py-2 my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">
                <li class="d-flex align-items-center mb-2">
                    <i class="icons icon-envelope text-color-dark me-2"></i>
                    <?= Yii::t('app', 'email') ?>: <a href="" class="text-color-dark text-color-hover-primary text-decoration-none ms-1"><span class="__cf_email__" data-cfemail="ff8f908d8b90bf9b90929e9691d19c9092">[email&#160;protected]</span></a>
                </li>
                <li class="d-flex align-items-center mb-0">
                    <i class="icons icon-phone text-color-dark me-2"></i>
                    <?= Yii::t('app', 'phone') ?>: <a href="tel:1234567890" class="text-color-dark text-color-hover-primary text-decoration-none ms-1"><?= $phoneNumber->number ?></a>
                </li>
            </ul>
            <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000"><?= Yii::t('app', 'lorem') ?></p>
        </div>
        <div class="col-lg-6 col-xl-5 offset-lg-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1250">
            <!-- <form class="contact-form custom-form-style-1" action="https://www.okler.net/previews/porto/9.7.0/php/contact-form.php" method="POST"> -->
            <?php

            use yii\bootstrap4\ActiveForm;

            $form = ActiveForm::begin() ?>

            <div class="row row-gutter-sm">
                <div class="form-group col mb-3">
                    <?= $form->field($messages, 'name')->textInput(['placeholder' => 'Name...', 'style' => 'padding:1.5rem;'], ['class' => 'form-control'])->label(false) ?>
                    <!-- <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required placeholder="First Name"> -->
                </div>
            </div>
            <div class="row row-gutter-sm">
                <div class="form-group col mb-3">
                    <?= $form->field($messages, 'email')->textInput(['placeholder' => 'Email...', 'style' => 'padding:1.5rem;'], ['class' => 'form-control'])->label(false) ?>
                    <!-- <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required placeholder="E-mail Address"> -->
                </div>
            </div>
            <div class="row">
                <div class="form-group col mb-3">
                    <?= $form->field($messages, 'message')->textarea(['placeholder' => 'Xabar kiriting...', 'style' => 'padding:1.5rem;'], ['class' => 'form-control'])->label(false) ?>
                    <!-- <textarea maxlength="5000" data-msg-required="Please enter your message." rows="4" class="form-control" name="message" id="message" required placeholder="Message"></textarea> -->
                </div>
            </div>
            <div class="row appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="1500">
                <div class="form-group col mb-0">
                    <button type="submit" class="btn btn-primary btn-modern font-weight-bold custom-btn-border-radius custom-btn-arrow-effect-1 text-3 px-5 py-3" data-loading-text="Loading...">
                        <?= Yii::t('app', 'submit') ?>
                        <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <polygon stroke="#FFF" stroke-width="0.1" fill="#FFF" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                        </svg>
                    </button>
                </div>
            </div>
            <?php ActiveForm::end() ?>
            <!-- </form> -->
        </div>
    </div>
</div>