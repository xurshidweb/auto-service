<?php

use yii\helpers\Html;
use kartik\switchinput\SwitchInput;
use gofuroov\multilingual\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'content')->textarea() ?>

    <?= $form->field($model, 'by')->textInput() ?>
    <?= $form->field($model, 'date')->widget(DatePicker::class, [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]); ?>

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
    <?= $form->field($model, 'status')->widget(SwitchInput::class, []); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>