<?php

use yii\bootstrap4\ActiveField;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;


?>
<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-color-dark font-weight-bold"><?= Yii::t('app', 'protectingCar') ?></h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-flex justify-content-md-end text-3-5">
                        <li><a href="<?= Url::to(['site/index']) ?>" class="text-color-default text-color-hover-primary text-decoration-none"><?= Yii::t('app', 'home') ?></a></li>
                        <li class="active"><?= Yii::t('app', 'blog') ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container pt-4 pb-5 my-5">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">

                <article>
                    <div class="card border-0">
                        <div class="card-body z-index-1 p-0">
                            <p class="text-uppercase text-1 mb-3 text-color-default"><time pubdate datetime="2022-01-10"><?= $blogs->date ?></time> <span class="opacity-3 d-inline-block px-2">|</span> <?= $blogs->comments ?> Comments <span class="opacity-3 d-inline-block px-2">|</span> <?= $blogs->by ?></p>

                            <div class="post-image pb-4">
                                <img class="card-img-top custom-border-radius-1" src="<?= $blogs->getImageUrl() ?>">
                            </div>

                            <div class="card-body p-0">
                                <p><?= $blogs->content ?></p>

                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox"></div>
                                <script data-cfasync="false" src="<?= Url::base() ?>/../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                <script type="text/javascript" src="<?= Url::base() ?>/../../../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60ba220dbab331b0"></script>

                                <div id="comments" class="post-block post-comments">

                                    <ul class="comments">
                                        <li>
                                            <div class="comment">
                                                <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                    <img class="avatar rounded-circle" alt="" src="<?= Url::base() ?>/img/avatars/avatar.jpg">
                                                </div>
                                                <?php foreach ($commentMessages as $commentMessage) : ?>
                                                    <div class="comment-block">
                                                        <div class="comment-arrow"></div>
                                                        <span class="comment-by">
                                                            <strong class="text-dark"><?= $commentMessage->name ?></strong>
                                                            <!-- <span class="float-end">
                                                                <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                            </span> -->
                                                        </span>
                                                        <p><?= $commentMessage->message ?></p>
                                                        <span class="date float-end"><?= date("d:M:Y, H:s:i", $commentMessage->created_at); ?></span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </li>
                                    </ul>
                                    <h3 class="text-color-primary text-capitalize font-weight-bold text-5 m-0 mb-3 mt-5"><?= Yii::t('app', 'leaveReply') ?></h3>
                                    <?php $form =  ActiveForm::begin(['options' => ['class' => 'custom-form-simple-validation p-4 rounded bg-color-grey']]) ?>
                                    <!-- <form class="custom-form-simple-validation p-4 rounded bg-color-grey" action="https://www.okler.net/" method="POST"> -->
                                    <div class="p-2">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label class="form-label required mb-1 font-weight-bold text-dark"><?= Yii::t('app', 'name') ?></label>
                                                <?= $form->field($comments, 'name')->textInput(['class' => 'form-control py-3 px-3 border-0 box-shadow-none'])->label(false) ?>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="form-label required mb-1 font-weight-bold text-dark"><?= Yii::t('app', 'email') ?></label>
                                                <?= $form->field($comments, 'email')->textInput(['class'=>'form-control py-3 px-3 border-0 box-shadow-none'])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="form-label required mb-1 font-weight-bold text-dark"><?= Yii::t('app', 'comment') ?></label>
                                                <?= $form->field($comments, 'message')->textarea(['class'=>'form-control p-3 border-0 box-shadow-none'])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col mb-0">
                                                <input type="submit" value='<?= Yii::t('app', 'postComment') ?>' class="btn btn-primary btn-modern" data-loading-text="Loading...">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                    <?php ActiveForm::end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
            <div class="blog-sidebar col-lg-4 pt-4 pt-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">
                <aside class="sidebar">
                    <div class="px-3 mb-4">
                        <h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3"><?= Yii::t('app', 'aboutBlog') ?></h3>
                        <p class="m-0"><?= Yii::t('app', 'littleLorem') ?></p>
                    </div>
                    <div class="py-1 clearfix">
                        <hr class="my-2">
                    </div>
                    <div class="px-3 mt-4">
                        <form action="<?= Url::to(['site/find']) ?>" method="get">
                            <div class="input-group mb-3 pb-1">
                                <input class="form-control box-shadow-none text-1 border-0 bg-color-grey" placeholder="Search..." name="find" id="s" type="text">
                                <button type="submit" class="btn bg-color-grey text-1 p-2"><i class="fas fa-search m-2"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="py-1 clearfix">
                        <hr class="my-2">
                    </div>
                    <div class="px-3 mt-4">
                        <h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3"><?= Yii::t('app', 'recentPosts') ?></h3>
                        <div class="pb-2 mb-1">
                            <?php foreach ($recentPosts as $recentPost) : ?>
                                <a href="" class="text-color-default text-uppercase text-1 mb-0 d-block text-decoration-none"><?= $recentPost->date ?><span class="opacity-3 d-inline-block px-2">|</span> <?= $recentPost->date ?> <?= Yii::t('app', 'comments') ?> <span class="opacity-3 d-inline-block px-2">|</span><?= $recentPost->by ?></a>
                                <a href="<?= Url::to(['site/post', 'id' => $recentPost->id]) ?>" class="text-color-dark text-hover-primary font-weight-bold text-3 d-block pb-3 line-height-4"><?= $recentPost->title ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="py-1 clearfix">
                        <hr class="my-2">
                    </div>
                    <div class="px-3 mt-4">
                        <h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3"><?= Yii::t('app', 'recentComments') ?></h3>
                        <div class="pb-2 mb-1">
                            <?php foreach ($commentMessages as $commentMessage) : ?>
                                <a href="#" class="text-color-default text-2 mb-0 d-block text-decoration-none line-height-4"><?= substr($commentMessage->message, 0, 18) ?> <strong class="text-color-dark text-hover-primary text-4"><?= $commentMessage->name ?></strong> <span class="text-uppercase text-1 d-block pt-1 pb-3">10 Jan 2022</span></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="py-1 clearfix">
                        <hr class="my-2">
                    </div>
                    <div class="px-3 mt-4">
                        <h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0"><?= Yii::t('app', 'categories') ?></h3>
                        <ul class="nav nav-list flex-column mt-2 mb-0 p-relative right-9">
                            <?php foreach ($posts as $post) : ?>
                                <li class="nav-item"><a class="nav-link bg-transparent border-0" href="<?= Url::to(['blog/index', 'id' => $post->id]) ?>"><?= $post->title ?> (<?= $post->getBlogCount() ?>)</a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <section class="section section-height-3 bg-primary border-0 m-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-7 text-center text-lg-start mb-4 mb-lg-0">
                    <h2 class="text-color-light font-weight-medium text-3-5 line-height-2 line-height-sm-1 ls-0 mb-2 mb-lg-2"><?= Yii::t('app', 'reliableServices') ?></h2>
                    <h3 class="font-weight-bold text-color-light text-transform-none text-8 line-height-2 line-height-lg-1 mb-1"><?= Yii::t('app', 'onlineForm') ?></h3>
                    <p class="font-weight-bold text-color-light text-4 opacity-7 mb-0"><?= Yii::t('app', 'onlineForm') ?></p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                        <div class="feature-box align-items-center mb-3 mb-lg-0">
                            <div class="feature-box-icon bg-transparent">
                                <i class="icons icon-phone text-6 text-color-light"></i>
                            </div>
                            <div class="feature-box-info line-height-2 ps-1">
                                <span class="d-block text-1 font-weight-semibold text-color-light mb-1"><?= $phoneNumber->title ?></span>
                                <strong class="text-4-5"><a href="tel:+1234567890" class="text-color-light text-decoration-none"><?= $phoneNumber->number ?></a></strong>
                            </div>
                        </div>
                        <a href="<?= Url::to(['site/appointment']) ?>" class="btn btn-light btn-outline custom-btn-border-radius font-weight-bold text-color-light text-color-hover-dark bg-color-hover-light btn-px-5 btn-py-3"><?= Yii::t('app', 'makeAppointment') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-transparent position-relative border-0 z-index-1 m-0 p-0">
        <div class="container py-4">
            <div class="row align-items-center text-center py-5">
                <?php foreach ($brandImages as $brandImage) : ?>
                    <div class="col-sm-4 col-lg-2 mb-5 mb-lg-0">
                        <img src="<?= $brandImage->getImageUrl() ?>" alt class="img-fluid" style="max-width: 90px;" />
                    </div>
                <? endforeach; ?>
            </div>
        </div>
        <svg class="custom-svg-3" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 193 495">
            <path fill="#1C5FA8" d="M193,25.73L18.95,247.93c-13.62,17.39-10.57,42.54,6.82,56.16L193,435.09V25.73z" />
            <path fill="none" stroke="#FFF" stroke-width="1.5" stroke-miterlimit="10" d="M196,53.54L22.68,297.08c-12.81,18-8.6,42.98,9.4,55.79L196,469.53V53.54z" />
        </svg>
    </section>

</div>