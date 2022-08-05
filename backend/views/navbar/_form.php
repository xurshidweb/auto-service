<?php

use yii\helpers\Html;
use kartik\switchinput\SwitchInput;
use gofuroov\multilingual\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Navbar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="navbar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->languageSwitcher($model); ?>

    <?= $form->field($model, 'home')->textInput() ?>

    <?= $form->field($model, 'about')->textInput() ?>

    <?= $form->field($model, 'services')->textInput() ?>

    <?= $form->field($model, 'products')->textInput() ?>

    <?= $form->field($model, 'blog')->textInput() ?>

    <?= $form->field($model, 'appointment')->textInput() ?>

    <?= $form->field($model, 'contact')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>