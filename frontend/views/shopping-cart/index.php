<?php

use common\models\Products;
use frontend\components\Cart;
use yii\helpers\Url;

?>

<div role="main" class="main shop pb-4">
	<div class="container">
		<?= $this->render('_order_table', [
			'products' => $products
		]) ?>
		<?= $this->render('_related-products'); ?>
	</div>
</div>