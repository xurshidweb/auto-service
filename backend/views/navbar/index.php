<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\NavbarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Navbars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navbar-index">

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
                'attribute' => 'home',
                'format' => 'raw',
            ],
            [
                'attribute' => 'about',
                'format' => 'raw',
            ],
            [
                'attribute' => 'services',
                'format' => 'raw',
            ],
            [
                'attribute' => 'products',
                'format' => 'raw',
            ],
            [
                'attribute' => 'blog',
                'format' => 'raw',
            ],
            [
                'attribute' => 'appointment',
                'format' => 'raw',
            ],
            [
                'attribute' => 'contact',
                'format' => 'raw',
            ],

            // [
            //     'attribute' => 'status',
            //     'value' => function ($model) {
            //         return "<a class='btn btn-info btn-md' href='" . Url::to(['navbar/change', 'id' => $model->id]) . "'>" . $model->getStatusLabel() . "</a>";
            //     },
            //     'format' => 'raw',
            //     'filter' => [
            //         1 => 'Faol',
            //         0 => 'Faol Emas',
            //     ],
            // ],
            [
                'class' => ActionColumn::class,
                'contentOptions' => ['style' => 'font-size:20px;'],
                'template' => '{view}{update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>