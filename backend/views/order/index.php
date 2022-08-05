<?php

use common\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tafsilotlar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index" style="background:#fff;padding:20px;">

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
            [
                'attribute' => 'model',
                'format' => 'raw',
            ],
            [
                'attribute' => 'color',
                'format' => 'raw',
            ],
            [
                'attribute' => 'year',
                'format' => 'raw',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>