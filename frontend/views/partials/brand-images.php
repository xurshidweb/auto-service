<?php

use common\models\Brandsimage;

$brandImages = Brandsimage::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();

?>

<section class="section bg-transparent position-relative border-0 z-index-1 m-0 p-0">
    <div class="container py-4">
        <div class="row align-items-center text-center py-5">
            <?php foreach ($brandImages as $brandImage) : ?>
                <div class="col-sm-4 col-lg-2 mb-5 mb-lg-0">
                    <img src="<?= $brandImage->getImageUrl() ?>" alt class="img-fluid" style="max-width: 90px;" />
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <svg class="custom-svg-3" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 193 495">
        <path fill="#1C5FA8" d="M193,25.73L18.95,247.93c-13.62,17.39-10.57,42.54,6.82,56.16L193,435.09V25.73z" />
        <path fill="none" stroke="#FFF" stroke-width="1.5" stroke-miterlimit="10" d="M196,53.54L22.68,297.08c-12.81,18-8.6,42.98,9.4,55.79L196,469.53V53.54z" />
    </svg>
</section>