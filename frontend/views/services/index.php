<div role="main" class="main">

    <?= $this->render('_services-header'); ?>

    <?= $this->render(
        '_services-basic',
        [
            'dataProvider' => $dataProvider,
            'services' => $services,
        ]
    ); ?>

    <?= $this->render('@frontend/views/partials/client-comments'); ?>

    <?= $this->render('@frontend/views/partials/make-appointment'); ?>

    <?= $this->render('@frontend/views/partials/brand-images'); ?>
</div>