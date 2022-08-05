<?

use yii\helpers\Url;
?>
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-color-dark font-weight-bold"><?= Yii::t('app', 'services') ?></h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-flex justify-content-md-end text-3-5">
                        <li><a href="<?= Url::to(['site/index']) ?>" class="text-color-default text-color-hover-primary text-decoration-none"><?= Yii::t('app', 'services') ?></a></li>
                        <li class="active"><?= Yii::t('app', 'services') ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container my-5 pt-4 pb-5">
        <div class="row">
            <div class="col-lg-8 order-lg-2 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                <?php foreach ($services as $service) : ?>
                    <div class="col-lg-12">
                        <p class="pb-2 mb-4"><?= $service->content ?> </p>
                        <img src="<?= $service->getImageUrl() ?>" class="img-fluid custom-border-radius-1 float-start me-4 mb-4" alt="" /><br><br><br><br><br><br><br><br>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- <div class="col-lg-8 order-lg-2 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                <p class="text-3-5">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin. </p>
                <p class="pb-2 mb-4">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                <img src="img/demos/auto-services/generic/generic-square-8.jpg" class="img-fluid custom-border-radius-1 float-start me-4 mb-4" alt="" />
                <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies nunc, eu interdum enim convallis pretium. Quisque eu neque augue. Aliquam egestas nunc at efficitur faucibus.</p>
                <p>Praesent mauris eros, tincidunt id enim sodales, rhoncus malesuada ligula. Vivamus quis purus nec sapien pellentesque imperdiet. Nullam porttitor augue mi, sit amet luctus est tincidunt sed. Donec tempus bibendum ex, nec vehicula elit. </p>
                <img src="img/demos/auto-services/generic/generic-square-9.jpg" class="img-fluid custom-border-radius-1 float-end ms-4 mb-4 mb-sm-0" alt="" />
                <p class="mt-5 mt-md-0 mt-xl-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies nunc, eu interdum enim convallis pretium. </p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies nunc, eu interdum enim convallis pretium. Quisque eu neque augue. Aliquam egestas nunc at efficitur faucibus. Praesent mauris eros, tincidunt id enim sodales, rhoncus malesuada ligula. Vivamus quis purus nec sapien pellentesque imperdiet. Nullam porttitor augue mi, sit amet luctus est tincidunt sed. Donec tempus bibendum ex, nec vehicula elit. </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies nunc, eu interdum enim convallis pretium. Quisque eu neque augue. Aliquam egestas nunc at efficitur faucibus. Praesent mauris eros, tincidunt id enim sodales, rhoncus malesuada ligula. Vivamus quis purus nec sapien pellentesque imperdiet. Nullam porttitor augue mi, sit amet luctus est tincidunt sed. Donec tempus bibendum ex, nec vehicula elit. Nullam porttitor augue mi, sit amet luctus est tincidunt sed. Donec tempus bibendum ex, nec vehicula elit. </p>
            </div> -->
            <div class="col-lg-4 order-lg-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250">
                <div class="card box-shadow-1 custom-border-radius-1 mb-5">
                    <div class="card-body z-index-1 py-4 my-3">
                        <h2 class="text-color-dark font-weight-bold text-6 mb-4"><?= Yii::t('app', 'allServices') ?></h2>
                        <ul class="custom-nav-list-effect-1 list list-unstyled mb-0">
                            <?php foreach ($catServices as $catService) : ?>
                                <li><a class="text-decoration-none text-color-dark text-color-hover-primary text-3-5" href="<?= Url::to(['site/choose', 'id' => $catService->id]) ?>"><?= $catService->title ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="card bg-primary custom-border-radius-1">
                    <div class="card-body text-center py-5 my-2">
                        <h2 class="text-color-light font-weight-medium text-3 line-height-2 line-height-sm-1 mb-3 pb-1"><?= Yii::t('app', 'reliableServices') ?></h2>
                        <h3 class="font-weight-bold text-color-light text-transform-none text-8 line-height-3 mb-3"><?= Yii::t('app', 'avto') ?></h3>
                        <p class="font-weight-bold text-color-light text-4 opacity-7 mb-5"><?= Yii::t('app', 'onlineForm') ?></p>
                        <div class="feature-box custom-feature-box-justify-center align-items-center text-start mb-4">
                            <div class="feature-box-icon bg-transparent">
                                <i class="icons icon-phone text-8 text-color-light"></i>
                            </div>
                            <div class="feature-box-info line-height-2 ps-1">
                                <span class="d-block text-4 font-weight-medium text-color-light mb-1"><?= $phoneNumber->title ?></span>
                                <strong class="text-6"><a href="tel:+998931631070" class="text-color-light text-decoration-none"><?= $phoneNumber->number ?></a></strong>
                            </div>
                        </div>
                        <a href="<?= Url::to(['appointment/index']) ?>" class="btn btn-light btn-outline custom-btn-border-radius font-weight-bold text-color-light text-color-hover-dark bg-color-hover-light btn-px-5 btn-py-3"><?= Yii::t('app', 'makeAppointment') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>