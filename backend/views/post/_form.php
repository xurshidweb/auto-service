<?php

use yii\helpers\Html;
use kartik\switchinput\SwitchInput;
use gofuroov\multilingual\widgets\ActiveForm;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), []); ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>