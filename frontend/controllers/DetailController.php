<?php

namespace frontend\controllers;

use common\models\Services;
use yii\web\Controller;

class DetailController extends Controller
{
    public function actionIndex($id)
    {
        $services = Services::find()->where(['status' => 1, 'id' => $id])->orderBy(['id' => SORT_DESC])->limit(2)->all();

        return $this->render(
            '_detail-basic',
            [
                'services' => $services,
            ]
        );
    }
}
