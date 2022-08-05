<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div role="main" class="main shop py-4">

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-5 mb-5 mb-lg-0">
                <h2 class="font-weight-bold text-5 mb-0"><?= Yii::t('app', 'login') ?></h2>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <label class="form-label text-color-dark text-3"><?= Yii::t('app', 'userNameOr') ?><span class="text-color-danger">*</span></label>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg text-4'])->label(false) ?>

                <label class="form-label text-color-dark text-3"><?= Yii::t('app', 'password') ?><span class="text-color-danger">*</span></label>
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg text-4'])->label(false) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <?= Yii::t('app', 'ifYou') ?> <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    <?= Yii::t('app', 'needEmail') ?> <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('KIRISH', ['class' => 'btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3', 'name' => 'login-button']) ?>
                </div>
                <div class="divider">
                    <span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">or</span>
                </div>
                <a href="http://facebook.com?=action" class="btn btn-primary-scale-2 btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading..."><i class="fab fa-facebook text-5 me-2"></i> Login With Facebook</a>
                <?php ActiveForm::end(); ?>
            </div>

        </div>

    </div>

</div>