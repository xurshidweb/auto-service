<?

?>
<div role="main" class="main">
    <?= $this->render('_blog-header'); ?>

    <?= $this->render('_blog-basic', [
        'blogs' => $blogs,
        'dataProvider' => $dataProvider,
    ]); ?>

    <?= $this->render('@frontend/views/partials/make-appointment'); ?>

    <?= $this->render('@frontend/views/partials/brand-images'); ?>

</div>