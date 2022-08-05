<?php

use yii\helpers\Url;

$value = Yii::$app->request->get('val');
?>

<form role="search" action="<?= Url::to(['site/search']) ?>" method="get">
    <div class="simple-search input-group">
        <input name="val" class="form-control text-1 rounded" id="headerSearch" type="search" placeholder="Search..." value="<?= $value ?>">
        <button class="btn" type="submit" id="addModal2">
            <i class="icons icon-magnifier header-nav-top-icon"></i>
        </button>
    </div>

</form>