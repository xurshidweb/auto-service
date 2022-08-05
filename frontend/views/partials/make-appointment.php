<?php

use common\models\Phone;
use yii\helpers\Url;

$phoneNumber = Phone::find()->where(['status' => 1])->one();


?>

<section class="section section-height-3 bg-primary border-0 m-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-7 text-center text-lg-start mb-4 mb-lg-0">
                <h2 class="text-color-light font-weight-medium text-3-5 line-height-2 line-height-sm-1 ls-0 mb-2 mb-lg-2"><?= Yii::t('app', 'reliableServices') ?></h2>
                <h3 class="font-weight-bold text-color-light text-transform-none text-8 line-height-2 line-height-lg-1 mb-1"><?= Yii::t('app', 'avto') ?></h3>
                <p class="font-weight-bold text-color-light text-4 opacity-7 mb-0"><?= Yii::t('app', 'onlineForm') ?></p>
            </div>
            <div class="col-lg-6 col-xl-5">
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                    <div class="feature-box align-items-center mb-3 mb-lg-0">
                        <div class="feature-box-icon bg-transparent">
                            <i class="icons icon-phone text-6 text-color-light"></i>
                        </div>
                        <div class="feature-box-info line-height-2 ps-1">
                            <span class="d-block text-1 font-weight-semibold text-color-light mb-1"><?= $phoneNumber->title ?></span>
                            <strong class="text-4-5"><a href="tel:+1234567890" class="text-color-light text-decoration-none"><?= $phoneNumber->number ?></a></strong>
                        </div>
                    </div>
                    <a href="<?= Url::to(['appointment/index']) ?>" class="btn btn-light btn-outline custom-btn-border-radius font-weight-bold text-color-light text-color-hover-dark bg-color-hover-light btn-px-5 btn-py-3"><?= Yii::t('app', 'makeAppointment') ?></a>
                </div>
            </div>
        </div>
    </div>
</section>