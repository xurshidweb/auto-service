<?php

use yii\helpers\Html;
use kartik\switchinput\SwitchInput;
use gofuroov\multilingual\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->widget(\kartik\file\FileInput::class, [
        'pluginOptions' => [
            'initialPreview' => Html::img($model->getImageUrl(), ['style' => 'width: 150px;']),
            'initialCaption' => "Faylni tanlang",
            'initialPreviewConfig' => [
                ['caption' => 'Moon.jpg', 'size' => '873727'],
                ['caption' => 'Earth.jpg', 'size' => '1287883'],
            ],
            'overwriteInitial' => false,
            'maxFileSize' => 2800
        ]
    ]); ?>
    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), []); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>