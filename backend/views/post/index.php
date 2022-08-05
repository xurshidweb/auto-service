<?php

use common\models\Blog;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Postlar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index" style="background:#fff;padding:20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },

                'detail' => function ($model, $key, $index, $column) {
                    // $items = $model->courseInfoes;
                    $itemsDataProvider = new ActiveDataProvider([
                        'query' => Blog::find()
                            ->andWhere(['owner_id' => $model->id])
                    ]);

                    return Yii::$app->controller->renderPartial('_items.php', [
                        'items' => $itemsDataProvider
                    ]);
                },

            ],

            [
                'attribute' => 'title',
                'format' => 'raw',
            ],

            [
                'attribute' => 'Rasm',
                'label' => 'Qo\'shish',
                'value' => function ($model) {
                    if (($model->getBlogs())) {
                        return "<a href='" . Url::to(['blog/create', 'id' => $model->id]) . "'><i class='fa fa-plus' title='Blog qo`shish'></i></a>";
                    } else {
                        return "<a href='" . Url::to(['blog/create', 'id' => $model->id]) . "'><i class='fa fa-minus' style='color:red'  title='Blog mavhud emsa maxsulot qo`shish'></i></a>";
                    }
                },
                'contentOptions' => ['style' => 'font-size: 20px'],
                'format' => 'raw'
            ],

            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return "<a class='btn btn-info btn-md' href='" . Url::to(['post/change', 'id' => $model->id]) . "'>" . $model->getStatusLabel() . "</a>";
                },
                'format' => 'raw',
                'filter' => [
                    1 => 'Faol',
                    0 => 'Faol Emas',
                ],
            ],
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>