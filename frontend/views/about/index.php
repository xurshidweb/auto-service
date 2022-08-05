<?

use yii\helpers\Url;
?>

<div role="main" class="main">

    <?= $this->render('_about-header'); ?>


    <?= $this->render('_about-brands'); ?>

    <?= $this->render('@frontend/views/partials/client-comments') ?>


    <?= $this->render('_about-works'); ?>

    <?= $this->render('@frontend/views/partials/make-appointment'); ?>


    <?= $this->render('@frontend/views/partials/brand-images'); ?>

</div>