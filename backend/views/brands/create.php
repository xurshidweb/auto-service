<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Brands */

$this->title = Yii::t('app', 'Qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brendlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brands-create" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
