<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrderProduct */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buyurtmalar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-product-view" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id',
                'format' => 'raw',
            ],
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->user->username;
                },
            ],
            [
                'attribute' => 'first_name',
                'format' => 'raw',
            ],
            [
                'attribute' => 'last_name',
                'format' => 'raw',
            ],
            [
                'attribute' => 'region',
                'format' => 'raw',
                'label' => "Maxsulot nomi",
                'value' => function ($model) {
                    $name = '';
                    foreach ($model->orderProductItems as $value) {
                        $name .= $value->title;
                    }
                    return $name;
                },
            ],
            [
                'attribute' => 'district',
                'format' => 'raw',
                'label' => "Tuman",
                'value' => function ($model) {
                    return $model->district;
                },
            ],
            'mfy',
            'street',
            'phone',
            'email:email',
            'message:ntext',
        ],
    ]) ?>

</div>