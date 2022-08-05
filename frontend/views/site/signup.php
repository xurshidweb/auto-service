<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div role="main" class="main shop py-4">

    <div class="container py-4">

        <div class="row justify-content-center">

            <div class="col-md-12 col-lg-5">
                <h2 class="font-weight-bold text-5 mb-0"><?= Yii::t('app', 'register') ?></h2>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <label class="form-label text-color-dark text-3"><?= Yii::t('app', 'userNameOr') ?><span class="text-color-danger">*</span></label>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg text-4'])->label(false) ?>

                <label class="form-label text-color-dark text-3"><?= Yii::t('app', 'email') ?> <span class="text-color-danger">*</span></label>
                <?= $form->field($model, 'email')->textInput(['class' => 'form-control form-control-lg text-4'])->label(false)  ?>

                <label class="form-label text-color-dark text-3"><?= Yii::t('app', 'password') ?><span class="text-color-danger">*</span></label>
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg text-4'])->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('RO\'YXATDAN O\'TISH', ['class' => 'btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>

</div>