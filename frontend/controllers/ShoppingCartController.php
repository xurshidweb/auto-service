<?php

namespace frontend\controllers;

use common\models\Products;
use frontend\components\Cart;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ShoppingCartController extends Controller
{
    // public function actionIndex()
    // {
    //     return $this->render(
    //         'index',
    //         []
    //     );
    // }


    public function actionIndex()
    {
        // [12, 13, 14]
        $query = Products::find()->andWhere(['in', 'id', Cart::getProductIds()]);
        $relatedProducts = Products::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(7)->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ]
        ]);

        $pagination = $dataProvider->pagination;
        $products = $dataProvider->models;

        return $this->render(
            'index',
            [
                'pagination' => $pagination,
                'products' => $products,
                'relatedProducts' => $relatedProducts,
            ]
        );
    }
}
