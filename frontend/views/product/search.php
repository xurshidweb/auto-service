<?

use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap4\LinkPager;


$value = Yii::$app->request->get('val');
?>

<div role="main" class="main">

    <?= $this->render('_product-header') ?>

    <div class="shop container py-4 my-5">
        <div class="row align-items-center justify-content-between mb-4">
            <div class="col-md-6 order-md-1">
                <form action="<?= Url::to(['site/search']) ?>" method="get">
                    <div class="form-group" style="display: flex;gap:1rem;">
                        <div class="custom-select-1" style="max-width: 280px;">
                            <!--  -->
                            <select class="form-select form-control border px-3 py-2 h-auto" name="filter">
                                <option value="">Sorting</option>
                                <option value="discount-asc">Sort by discount: low to high</option>
                                <option value="discount-desc">Sort by discount: high to low</option>
                                <option value="price-asc">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>
                        <input type="hidden" name="val" value="<?= $val ?>">
                        <button type="submit" class="btn btn-danger" data-loading-text="Loading...">OK
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="products row row-gutter-sm mb-4">
            <?php foreach ($products as $product) : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="product mb-0">
                        <div class="product-thumb-info mb-3">
                            <div class="product-thumb-info-badges-wrapper">
                                <?php
                                if ($product->check == 1) {
                                ?>
                                    <span class="badge badge-ecommerce badge-success">Yangi</span>
                                <?
                                }
                                ?>

                                <?php if (!empty($product->discount)) : ?>
                                    <span class="badge badge-ecommerce badge-danger"><?= $product->discount ?>% <?= Yii::t('app', 'off') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="addtocart-btn-wrapper">
                                <a href="<?= Url::to(['site/add-to-cart', 'id' => $product->id]) ?>" id="addToCart" class="text-decoration-none addtocart-btn" title="Add to Cart">
                                    <i class="icons icon-bag"></i>
                                </a>
                            </div>
                            <a href="#" class="quick-view text-uppercase font-weight-semibold text-2">
                                <?= Yii::t('app', 'viewAll') ?>
                            </a>
                            <a href="#">
                                <div class="product-thumb-info-image bg-light">
                                    <img alt="" class="img-fluid" src="<?= $product->image() ?>">
                                </div>
                            </a>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="#" class="text-color-dark text-color-hover-primary"><?= $product->name ?></a></h3>
                            </div>
                        </div>
                        <div title="Rated 5 out of 5">
                            <input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
                        </div>
                        <p class="price text-5 mb-3">
                            <span class="sale text-color-dark font-weight-medium"><?= $product->newcost ?></span>
                            <span class="amount"><?= $product->oldcost ?></span>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row align-items-center justify-content-md-between mt-4">
            <div class="col-md-auto mb-3 mb-md-0">
                <!-- <p class="mb-0">Showing 1-8 of 24?> products</p> -->
            </div>
            <div class="col-md-auto">
                <nav aria-label="Page navigation example">
                    <ul class="custom-pagination-style-1 pagination pagination-rounded pagination-md justify-content-center">
                        <?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <?= $this->render('@frontend/views/partials/client-comments') ?>

    <?= $this->render('@frontend/views/partials/make-appointment'); ?>

    <?= $this->render('@frontend/views/partials/brand-images'); ?>

</div>