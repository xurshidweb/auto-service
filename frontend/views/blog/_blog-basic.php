<?php

use common\models\Blog;
use common\models\Comments;
use common\models\Post;
use yii\bootstrap4\LinkPager;
use yii\helpers\Url;

$recentPosts = Blog::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();
$commentMessages = Comments::find()->where(['status' => 1])->limit(3)->all();
$posts = Post::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();

?>

<div class="container pt-4 pb-5 my-5">
    <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">
            <?php

            foreach ($blogs as $blog) : ?>
                <article class="mb-5">
                    <div class="card bg-transparent border-0 custom-border-radius-1">
                        <div class="card-body p-0 z-index-1">
                            <a href="<?= Url::to(['site/post', 'id' => $blog->id]) ?>">
                                <img class="card-img-top custom-border-radius-1 mb-2" src="<?= $blog->getImageUrl() ?>" alt="Card Image">
                            </a>
                            <p class="text-uppercase text-color-default text-1 my-2">
                                <time pubdate datetime="2022-01-10"><?= $blog->date ?></time>
                                <span class="opacity-3 d-inline-block px-2">|</span>
                                <?= $blog->comments ?> <?= Yii::t('app', 'comments') ?>
                                <span class="opacity-3 d-inline-block px-2">|</span>
                                <?= $blog->by ?>
                            </p>
                            <div class="card-body p-0">
                                <h4 class="card-title text-5 font-weight-bold pb-1 mb-2"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="<?= Url::to(['site/post', 'id' => $blog->id]) ?>"><?= $blog->title ?></a></h4>
                                <p class="card-text mb-2"><?= substr($blog->content, 0, 50) . "..." ?></p>
                                <a href="<?= Url::to(['site/post', 'id' => $blog->id]) ?>" class="btn btn-link font-weight-semibold text-decoration-none text-3 ps-0"><?= Yii::t('app', 'viewAll') ?></a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
            <ul class="custom-pagination-style-1 pagination pagination-rounded pagination-md justify-content-center">
                <?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>
            </ul>
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
                    <form method="get" action="<?= Url::to(['site/find']) ?>">
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
                            <a href="" class="text-color-default text-uppercase text-1 mb-0 d-block text-decoration-none"><?= $recentPost->date ?> <span class="opacity-3 d-inline-block px-2">|</span> <?= $recentPost->date ?> <?= Yii::t('app', 'comments') ?> <span class="opacity-3 d-inline-block px-2">|</span> <?= $recentPost->by ?></a>
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
                            <a href="<?= Url::to(['site/post', 'id' => $recentPost->id]) ?>" class="text-color-default text-2 mb-0 d-block text-decoration-none line-height-4"><?= substr($commentMessage->message, 0, 18) ?> <strong class="text-color-dark text-hover-primary text-4"><?= $commentMessage->name ?></strong> <span class="text-uppercase text-1 d-block pt-1 pb-3"><?= $recentPost->date ?></span></a>
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
                            <li class="nav-item"><a class="nav-link bg-transparent border-0" href="<?= Url::to(['blog/detail', 'id' => $post->id]) ?>"><?= $post->title ?> (<?= $post->getBlogCount() ?>)</a></li>
                        <?php endforeach; ?>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</div>