<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Images */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avto rasmlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="images-view" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Tahrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'O\'chirish'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'img',
                'value' => function ($model) {
                    return "<img src='" . $model->getImageUrl() . "' width='100'>";
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return "<a class='btn btn-info btn-md' href='" . Url::to(['images/change', 'id' => $model->id]) . "'>" . $model->getStatusLabel() . "</a>";
                },
                'format' => 'raw',
                'filter' => [
                    1 => 'Faol',
                    0 => 'Faol Emas',
                ],
            ],
        ],
    ]) ?>

</div>
