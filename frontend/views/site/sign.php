<div role="main" class="main shop py-4">

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-5 mb-5 mb-lg-0">
                <h2 class="font-weight-bold text-5 mb-0"><?= Yii::t('app', 'login') ?></h2>
                <form action="https://www.okler.net/" id="frmSignIn" method="post" class="needs-validation">
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3"><?= Yii::t('app', 'email') ?> <span class="text-color-danger">*</span></label>
                            <input type="text" value="" class="form-control form-control-lg text-4" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3"><?= Yii::t('app', 'password') ?> <span class="text-color-danger">*</span></label>
                            <input type="password" value="" class="form-control form-control-lg text-4" required>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="form-group col-md-auto">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                <label class="form-label custom-control-label cur-pointer text-2" for="rememberme"><?= Yii::t('app', 'rememberMe') ?></label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="#"><?= Yii::t('app', 'forgotPassword') ?>?</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading..."><?= Yii::t('app', 'login') ?></button>
                            <div class="divider">
                                <span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">or</span>
                            </div>
                            <a href="#" class="btn btn-primary-scale-2 btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading..."><i class="fab fa-facebook text-5 me-2"></i> Login With Facebook</a>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>

    </div>

</div>