<?php

namespace frontend\controllers;

use common\models\Services;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ServicesController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Services::find()->where(['status' => 1]),
            'pagination' => [
                'pageSize' => 4,
            ]
        ]);
        $services = $dataProvider->models;
        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider,
                'services' => $services,
            ]
        );
    }
}
