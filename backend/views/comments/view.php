<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Comments */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izohlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comments-view" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'name',
                'format' => 'raw',
            ],

            [
                'attribute' => 'email',
                'format' => 'raw',
            ],
            [
                'attribute' => 'message',
                'format' => 'raw',
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return "<a class='btn btn-info btn-md' href='" . Url::to(['comments/change', 'id' => $model->id]) . "'>" . $model->getStatusLabel() . "</a>";
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