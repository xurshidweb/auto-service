<?php

use yii\helpers\Url;

/** @var \soft\web\View $this */


$this->title = Yii::t('app', 'Shaxsiy kabinet');
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="profilemanager-default-index">
    <h1><?= $this->title ?></h1>
    <p>
        <a href="<?= Url::to(['change-login']) ?>" class="btn btn-primary">
            <i class="fa fa-edit"></i> <?= Yii::t('app', 'Login o\'zgartirish') ?>
        </a>
        <a href="<?= Url::to(['change-password']) ?>" class="btn btn-danger">
            <i class="fa fa-key"></i> <?= Yii::t('app', 'Parol o\'zgartirish') ?>
        </a>
    </p>
</div>