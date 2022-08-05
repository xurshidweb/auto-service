<?php

use common\models\Works;

$works = Works::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();

?>

<div class="container my-5 pt-5">
    <div class="row">
        <?php

        use yii\helpers\Url;

        foreach ($works as $work) : ?>
            <div class="col-lg-4 text-center px-lg-5 mb-5 mb-lg-0">
                <a href="<?= Url::to(['services/index']) ?>" class="text-decoration-none">
                    <div class="custom-icon-box-style-1 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="250" data-plugin-options="{'accY': -200}">
                        <div class="custom-icon-style-1 mb-4">
                            <img width="50" src="<?= $work->getImageUrl() ?>" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                        </div>
                        <h3 class="text-transform-none font-weight-bold text-color-dark line-height-3 text-4-5 px-3 px-xl-5 my-2"><?= $work->title ?></h3>
                        <p><?= substr($work->content, 0, 50) . "..." ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>