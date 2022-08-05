<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sort */

$this->title = Yii::t('app', 'Create Sort');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sorts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sort-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
