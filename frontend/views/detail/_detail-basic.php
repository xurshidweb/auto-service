<?php

use common\models\CategoryServices;
use common\models\Services;
use yii\helpers\Url;

$services = Services::find()->where(['status' => 1, 'id' => $id])->orderBy(['id' => SORT_DESC])->limit(2)->all();
$catServices = CategoryServices::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(7)->all();
?>

<div class="container my-5 pt-4 pb-5">
    <div class="row">
        <?php foreach ($services as $service) : ?>
            <div class="col-lg-8 order-lg-2 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                <p class="text-3-5"><?= $service->content ?> </p>
                <p class="pb-2 mb-4"><?= $service->content ?> </p>
                <img src="<?= $service->getImageUrl() ?>" class="img-fluid custom-border-radius-1 float-start me-4 mb-4" alt="" />

            </div>
        <?php endforeach; ?>
        <div class="col-lg-4 order-lg-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250">
            <div class="card box-shadow-1 custom-border-radius-1 mb-5">
                <div class="card-body z-index-1 py-4 my-3">
                    <h2 class="text-color-dark font-weight-bold text-6 mb-4"><?= Yii::t('app', 'allServices') ?></h2>
                    <ul class="list list-unstyled mb-0">
                        <?php foreach ($catServices as $catService) : ?>
                            <li class="mb-0"><a href="<?= Url::to(['site/choose', 'id' => $catService->id]) ?>"><?= $catService->title ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="card bg-primary custom-border-radius-1">
                <div class="card-body text-center py-5 my-2">
                    <h2 class="text-color-light font-weight-medium text-3 line-height-2 line-height-sm-1 mb-3 pb-1">LOOKING FOR HONEST AND RELIABLE SERVICES?</h2>
                    <h3 class="font-weight-bold text-color-light text-transform-none text-8 line-height-3 mb-3">Best Mechanics Downtown Los Angeles CA</h3>
                    <p class="font-weight-bold text-color-light text-4 opacity-7 mb-5">Make An Appointment Today With Our Online Form</p>
                    <div class="feature-box custom-feature-box-justify-center align-items-center text-start mb-4">
                        <div class="feature-box-icon bg-transparent">
                            <i class="icons icon-phone text-8 text-color-light"></i>
                        </div>
                        <div class="feature-box-info line-height-2 ps-1">
                            <span class="d-block text-4 font-weight-medium text-color-light mb-1">CALL US NOW</span>
                            <strong class="text-6"><a href="tel:+1234567890" class="text-color-light text-decoration-none">+123 4567 890</a></strong>
                        </div>
                    </div>
                    <a href="demo-auto-services-appointment.html" class="btn btn-light btn-outline custom-btn-border-radius font-weight-bold text-color-light text-color-hover-dark bg-color-hover-light btn-px-5 btn-py-3">MAKE AN APPOINTMENT</a>
                </div>
            </div>
        </div>
    </div>
</div>