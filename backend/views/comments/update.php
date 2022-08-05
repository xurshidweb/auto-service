<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */

$this->title = Yii::t('app', 'Tahrirlash: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izohlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="comments-update" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>