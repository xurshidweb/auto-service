<?php

namespace frontend\controllers;

use common\models\Order;
use Yii;
use yii\web\Controller;

class AppointmentController extends Controller
{
    public function actionIndex()
    {
        $order = new Order();
        if ($order->load(Yii::$app->request->post()) && $order->validate()) {
            if ($order->save()) {
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $this->render(
            '_appointment-basic',
            [
                'order' => $order,
            ]
        );
    }
}
