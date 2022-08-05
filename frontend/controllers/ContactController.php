<?php

namespace frontend\controllers;

use common\models\Messages;
use Yii;
use yii\web\Controller;

class ContactController extends Controller
{
    public function actionIndex()
    {
        $message = new Messages();
        if ($message->load(Yii::$app->request->post())) {
            if ($message->save()) {
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $this->render(
            '_contact-basic',
            [
                'messages' => $message
            ]
        );
    }
}
