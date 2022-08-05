<?php


use common\models\Modell;
use common\models\Order;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;


?>

<div class="container my-5 pt-4 pb-5">
    <div class="row mb-3">
        <div class="col">
            <p class="text-3-5"><?= Yii::t('app', 'lorem') ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php

            $form = ActiveForm::begin(['method' => 'POST']) ?>

            <div class="row">
                <div class="col">
                    <h2 class="text-color-dark font-weight-bold text-4-5 mb-3"><?= Yii::t('app', 'personalInformation1') ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <?= $form->field($order, 'first_name')->textInput(['placeholder' => 'Ism...', 'style' => 'padding:1.5rem;border-radius:10px;border:1px solid gray;'], ['class' => 'form-control'])->label(false) ?>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <?= $form->field($order, 'last_name')->textInput(['placeholder' => 'Familiya...', 'style' => 'padding:1.5rem;border-radius:10px;border:1px solid gray;'], ['class' => 'form-control'])->label(false) ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-md-6 mb-3">
                    <?= $form->field($order, 'email')->textInput(['placeholder' => 'E-mail...', 'style' => 'padding:1.5rem;border-radius:10px;border:1px solid gray;'], ['class' => 'form-control'])->label(false) ?>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <?= $form->field($order, 'phone')->textInput(['placeholder' => 'Telefonf raqam...', 'style' => 'padding:1.5rem;border-radius:10px;border:1px solid gray;'], ['class' => 'form-control'])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-color-dark font-weight-bold text-4-5 mb-3"><?= Yii::t('app', 'vehicleInformation') ?></h2>
                </div>
            </div>
            <div class="row pb-2 mb-4">
                <div class="form-group col-md-4 mb-md-0">
                    <div class="custom-select-1 custom-select-1-arrow-position">
                        <?= $form->field($order, 'model')->dropDownList(
                            ArrayHelper::map(Modell::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->all(), 'title', 'title'),
                            ['prompt' => 'Rusumini tanlang', 'class' => 'form-select form-control',],
                            ['sytle' => 'padding:1.5rem;border-radius:10px;border:1px solid gray;']
                        )->label(false); ?>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-md-0">
                    <?= $form->field($order, 'color')->textInput(['type' => 'color'])->label(false) ?>
                </div>
                <div class="form-group col-md-4 mb-md-0">

                    <?= $form->field($order, 'year')->textInput(['placeholder' => 'Yil...', 'style' => 'border:1px solid gray;'], ['class' => 'form-control'])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-color-dark font-weight-bold text-4-5 mb-3"><?= Yii::t('app', 'yourReason') ?></h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col">
                    <?= $form->field($order, 'message')->textarea(['style' => 'padding:5.5rem;border-radius:10px;border:1px solid gray;'], ['class' => 'form-control'])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-color-dark font-weight-bold text-4-5 mb-1"><?= Yii::t('app', 'data') ?></h2>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <?= $form->field($order, 'date1')->textInput(['type' => 'date'], ['placeholder' => 'Date', 'style' => 'border:1px solid gray;'], ['class' => 'form-control'])->label(false) ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= $form->field($order, 'time1')->textInput(['type' => 'time'], ['placeholder' => 'Date', 'style' => 'border:1px solid gray;'], ['class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <?= $form->field($order, 'date2')->textInput(['type' => 'date'], ['placeholder' => 'Date', 'style' => 'border:1px solid gray;'], ['class' => 'form-control'])->label(false) ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= $form->field($order, 'time2')->textInput(['type' => 'time'], ['placeholder' => 'Date', 'style' => 'border:1px solid gray;'], ['class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-2 mb-4">
                <div class="col">
                    <div class="alert alert-warning custom-alert-bg-color-1">
                        <p class="text-2 mb-0"><i class="fas fa-info-circle me-1"></i><?= Yii::t('app', 'notice') ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col mb-0">
                    <button type="submit" class="btn btn-primary btn-modern font-weight-bold custom-btn-border-radius custom-btn-arrow-effect-1 text-3 px-5 py-3" data-loading-text="Loading...">
                        <?= Yii::t('app', 'submit') ?>
                        <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <polygon stroke="#FFF" stroke-width="0.1" fill="#FFF" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                        </svg>
                    </button>
                </div>
            </div>
            </form>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>