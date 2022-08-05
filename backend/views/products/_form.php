<?php

use yii\helpers\Html;
use kartik\switchinput\SwitchInput;
use gofuroov\multilingual\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;


/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oldcost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'newcost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'check')->widget(CheckboxX::classname(), [
        'autoLabel' => true
    ])->label('New'); ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::class, []); ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>