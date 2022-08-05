<?

use common\models\CategoryServices;
use common\models\Phone;
use yii\helpers\Url;

$phoneNumber = Phone::find()->where(['status' => 1])->one();
$catServices = CategoryServices::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(7)->all();


?>
<footer id="footer" class="border-0 mt-0">
    <div class="container py-5">
        <div class="row py-3">
            <div class="col-md-4 mb-5 mb-md-0">
                <div class="feature-box flex-column flex-xl-row align-items-center align-items-lg-start text-center text-lg-start">
                    <div class="feature-box-icon bg-transparent mb-4 mb-xl-0 p-0">
                        <img width="45" src="<?= Url::base() ?>/img/demos/auto-services/icons/icon-location.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light position-relative bottom-3'}" />
                    </div>
                    <div class="feature-box-info line-height-1 ps-2">
                        <span class="d-block font-weight-bold text-color-light text-5 mb-2"><?= Yii::t('app', 'address') ?></span>
                        <p class="text-color-light text-4 line-height-4 font-weight-light mb-0"><?= Yii::t('app', 'addressFull') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5 mb-md-0">
                <div class="feature-box flex-column flex-xl-row align-items-center align-items-lg-start text-center text-lg-start">
                    <div class="feature-box-icon bg-transparent mb-4 mb-xl-0 p-0">
                        <i class="icons icon-phone text-9 text-color-light position-relative top-4"></i>
                    </div>
                    <div class="feature-box-info line-height-1 ps-2">
                        <span class="d-block font-weight-bold text-color-light text-5 pb-1 mb-1"><?= $phoneNumber->title ?></span>
                        <a href="tel:1234567890" class="text-color-light text-4 line-height-7 text-decoration-none"><?= $phoneNumber->number ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box flex-column flex-xl-row align-items-center align-items-lg-start text-center text-lg-start">
                    <div class="feature-box-icon bg-transparent mb-4 mb-xl-0 p-0">
                        <img width="45" src="<?= Url::base() ?>/img/demos/auto-services/icons/car-winch.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light position-relative bottom-3'}" />
                    </div>
                    <div class="feature-box-info line-height-1 ps-xl-3">
                        <span class="d-block font-weight-bold text-color-light text-5 pb-1 mb-1">24/7
                            <?= Yii::t('app', 'assistance') ?></span>
                        <a href="tel:1234567890" class="text-color-light text-4 line-height-7 text-decoration-none"><?= $phoneNumber->number ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="bg-light opacity-2 my-0">
    <div class="container pb-5">
        <div class="row text-center text-md-start py-4 my-5">
            <div class="col-md-6 col-lg-3 align-self-center text-center text-md-start text-lg-center mb-5 mb-lg-0">
                <a href="<?= Url::to(['services/index']) ?>" class="text-decoration-none">
                    <img src="<?= Url::base() ?>/img/demos/auto-services/logo-light.png" class="img-fluid" alt="" />
                </a>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4"><?= Yii::t('app', 'about') ?></h5>
                <ul class="list list-unstyled">
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-semibold line-height-1 text-color-grey text-3-5"><?= Yii::t('app', 'address') ?></span>
                        <a href="" class="text-color-light custom-text-underline-1 font-weight-medium text-3-5"><?= Yii::t('app', 'getDirection') ?></a>
                    </li>
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-semibold line-height-1 text-color-grey text-3-5 mb-1"><?= $phoneNumber->title ?></span>
                        <ul class="list list-unstyled font-weight-light text-3-5 mb-0">
                            <li class="text-color-light line-height-3 mb-0">
                                <a href="tel:+998931631070" class="text-decoration-none text-color-light text-color-hover-default"><?= $phoneNumber->number ?></a>
                            </li>
                            <li class="text-color-light line-height-3 mb-0">
                                <a href="tel:+998931631070" class="text-decoration-none text-color-light text-color-hover-default"><?= $phoneNumber->number ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-semibold line-height-1 text-color-grey text-3-5"><?= Yii::t('app', 'email') ?></span>
                        <a href="https://www.okler.net/cdn-cgi/l/email-protection#bfd2ded6d3ffdac7ded2cfd3da91dcd0d2" class="text-decoration-none font-weight-light text-3-5 text-color-light text-color-hover-default"><span class="__cf_email__" data-cfemail="7914181015391c01181409151c571a1614">[<?= Yii::t('app', 'emailProtected') ?>]</span></a>
                    </li>
                </ul>
                <ul class="social-icons social-icons-medium">
                    <?php $url = Yii::$app->urlManager->createAbsoluteUrl(Url::current()) ?>
                    <li class="social-icons-telegram">
                        <a href="https://telegram.me/share/url?url=<?= $url ?>" class="no-footer-css" target="_blank" title="Telegram"><i class="fab fa-telegram"></i></a>
                    </li>
                    <li class="social-icons-twitter mx-2">
                        <a href="https://twitter.com/intent/tweet?url=<?= $url ?>" class="no-footer-css" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="social-icons-facebook">
                        <a href="https://www.facebook.com/" class="no-footer-css" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-2 mb-5 mb-md-0">
                <h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4"><?= Yii::t('app', 'autoServices') ?>
                </h5>
                <ul class="list list-unstyled mb-0">
                    <?php foreach ($catServices as $catService) : ?>
                        <li class="mb-0"><a href="<?= Url::to(['site/choose', 'id' => $catService->id]) ?>"><?= $catService->title ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 offset-lg-1">
                <h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4"><?= Yii::t('app', 'openingHours') ?>
                </h5>
                <ul class="list list-unstyled list-inline custom-list-style-1 mb-0">
                    <li><?= Yii::t('app', 'workingDay') ?>: 8:30-5:00</li>
                    <!-- <li>Saturday: 9:30 am to 1:00 pm</li> -->
                    <li><?= Yii::t('app', 'dayOff') ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright bg-light py-4">
        <div class="container py-2">
            <div class="row">
                <div class="col">
                    <p class="text-center text-3 mb-0"><?= Yii::t('app', 'made') ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>