<?php

use yii\helpers\Url as HelpersUrl;

?>
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1 class="text-color-dark font-weight-bold"><?= Yii::t('app', 'contact') ?></h1>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-flex justify-content-md-end text-3-5">
                    <li><a href="<?= HelpersUrl::to(['site/index']) ?>" class="text-color-default text-color-hover-primary text-decoration-none"><?= Yii::t('app', 'home') ?></a></li>
                    <li class="active"><?= Yii::t('app', 'contact') ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>