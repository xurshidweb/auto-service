<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Images */

$this->title = Yii::t('app', 'Qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avto rasmlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-create" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>