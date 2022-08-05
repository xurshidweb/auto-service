<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\models\Phone;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use frontend\components\Cart;
use yii\bootstrap4\Modal;
use yii\bootstrap\Modal as BootstrapModal;

$products = Cart::products();


$phoneNumber = Phone::find()->where(['status' => 1])->one();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<html data-style-switcher-options="{'changeLogo': false, 'colorPrimary': '#1c5fa8', 'colorSecondary': '#e36159', 'colorTertiary': '#2baab1', 'colorQuaternary': '#383f48'}">


<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title = 'Demo Auto Services | Porto - Multipurpose Website Template') ?></title>
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&amp;display=swap" rel="stylesheet" type="text/css">
    <link style="background-color: #fff !important;" rel="icon" type="image/x-icon" href="<?= Url::base() ?>/img/apple-touch-icon.png">
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody();

    ?>

    <div class="body">
        <div class="notice-top-bar bg-primary" data-sticky-start-at="100">
            <button class="hamburguer-btn hamburguer-btn-light notice-top-bar-close m-0 active" data-set-active="false">
                <span class="close">
                    <span></span>
                    <span></span>
                </span>
            </button>
            <div class="container">
                <div class="row justify-content-center py-2">
                    <div class="col-9 col-md-12 text-center">
                        <p class="text-color-light mb-0"><strong><?= Yii::t('app', 'dealWeek') ?></strong> - <?= Yii::t('app', 'partner') ?> - <strong><a href="#" class="text-color-light text-decoration-none custom-text-underline-1"><?= Yii::t('app', 'topAppointment') ?></a></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->render('_header'); ?>
        <?= $content ?>
        <?= $this->render('_footer'); ?>
    </div>

    <?php $this->endBody() ?>
</body>



<?php BootstrapModal::begin([
    // 'header' => "Header",    
    'size' => 'modal-lg',
    'options' => ['id' => 'modal_one']
]); ?>


<div class="row">
    <div class="col-lg-12">
        <div id="loading"></div>
    </div>
</div>

<?php
BootstrapModal::end();
?>

</html>
<?php $this->endPage();
