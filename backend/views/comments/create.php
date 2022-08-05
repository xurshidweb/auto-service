<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */

$this->title = Yii::t('app', 'Qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izohlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>