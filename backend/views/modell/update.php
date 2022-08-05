<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Modell */

$this->title = Yii::t('app', 'Tahrirlash: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avto modellar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="modell-update" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
