<?php

namespace frontend\controllers;

use common\models\CategoryServices;
use yii\web\Controller;
use common\models\Products;
use yii\data\ActiveDataProvider;

class ProductController extends Controller
{


    public function actionIndex()
    {

        
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()->where(['status' => 1]),
            'pagination' => [
                'pageSize' => 8,
            ],
           
        ]);
        $products = $dataProvider->models;
        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider,
                'products' => $products,

            ]
        );
    }
}
