<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Products;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mahsulotlar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'format' => 'raw',
            ],
            [
                'attribute' => 'oldcost',
                'format' => 'raw',
            ],
            [
                'attribute' => 'newcost',
                'format' => 'raw',
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return "<a class='btn btn-info btn-md' href='" . Url::to(['products/change', 'id' => $model->id]) . "'>" . $model->getStatusLabel() . "</a>";
                },
                'format' => 'raw',
                'filter' => [
                    1 => 'Faol',
                    0 => 'Faol Emas',
                ],
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {img}',
                'buttons' => [
                    'img' => function ($url, $model) {
                        return Html::a(
                            '<i class="glyphicon glyphicon-picture"></i>',
                            ['products/img', 'id' => $model->id],
                            [
                                'title' => 'Rasm yuklash',
                                'data-pjax' => '0',
                                'data' => [
                                    'Rasm yuklamoqchimisiz?',
                                ],
                            ]
                        );
                    }
                ]

            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>