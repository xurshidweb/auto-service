<?php

namespace frontend\controllers;

use common\models\OrderProduct;
use common\models\Products;
use frontend\components\Cart;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class OrderController extends Controller
{

    public function actionIndex($id)
    {
        $query = Products::find()->andWhere(['in', 'id', Cart::products()]);
        $orderProduct = OrderProduct::findOne(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ]
        ]);
        $products = $dataProvider->models;
        $pagination =  $dataProvider->pagination;
        return $this->render(
            'index',
            [
                'products' => $products,
                'pagination' => $pagination,
                'model' => $orderProduct,
            ]
        );
    }
}
