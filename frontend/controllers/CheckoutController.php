<?php

namespace frontend\controllers;

use common\models\OrderProduct;
use common\models\OrderProductItem;
use common\models\Products;
use frontend\components\Cart;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CheckoutController extends Controller
{
    public function actionIndex()
    {
        $query = Products::find()->andwhere(['in', 'id', Cart::products()]);
        $orderProducts = new OrderProduct();
        // $orderProductsItem = new OrderProductItem();
        if ($orderProducts->load(Yii::$app->request->post() && $orderProducts->save())) {
            return $this->redirect(['/order/index', 'id' => $orderProducts->id]);
        }

        // if ($orderProductsItem->load(Yii::$app->request->post()) && $orderProductsItem->validate()) {
        //     if ($orderProductsItem->save()) {
        //         return $this->redirect(['/order/index', 'id' => $orderProductsItem->id]);
        //     }
        // }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ]
        ]);
        $products = $dataProvider->models;
        $pagination = $dataProvider->pagination;

        return $this->render(
            'index',
            [
                'products' => $products,
                'pagination' => $pagination,
                'orderProducts' => $orderProducts,
            ]
        );
    }
}
