<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderProductItem */

$this->title = Yii::t('app', 'Create Order Product Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Product Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-product-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
