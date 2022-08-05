<?php

use common\models\OrderProduct;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buyurtmalar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-product-index" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'attribute' => 'phone',
                'format' => 'raw',
            ],
          
            //'district',
            //'mfy',
            //'street',
            //'phone',
            //'email:email',
            //'message:ntext',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, OrderProduct $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view}',
                'contentOptions' => ['style' => 'font-size:1.8rem;']
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>