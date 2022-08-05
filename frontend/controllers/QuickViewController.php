<?php

namespace frontend\controllers;

use common\models\Comments;
use common\models\Messages;
use common\models\Phone;
use common\models\Products;
use Yii;
use frontend\components\Cart;
use yii\web\Controller;

class QuickViewController extends Controller
{

    public function actionIndex($id)
    {
        $phoneNumber = Phone::find()->where(['status' => 1])->one();
        $products = Products::find()->where(['status' => 1, 'id' => $id])->one();
        $relatedProducts = Products::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(7)->all();
        $message = new Messages();
        $comments = new Comments([
            'product_id' => $products->id
        ]);

        if ($message->load(Yii::$app->request->post()) && $message->validate()) {
            if ($message->save()) {
                return $this->redirect(Yii::$app->request->referrer);
            }
        }


        if ($comments->load(Yii::$app->request->post()) && $comments->validate()) {
            $comments->status = 1;
            if ($comments->save()) {
                $comments->updateCounters(['view_count' => 1]);
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        $commentMessages = Comments::find()->where(['status' => 1, 'product_id' => $id])->orderBy(['id' => SORT_DESC])->limit(3)->all();


        return $this->render(
            'index',
            [
                'phoneNumber' => $phoneNumber,
                'message' => $message,
                'products' => $products,
                'relatedProducts' => $relatedProducts,
                'comments' => $comments,
                'commentMessages' => $commentMessages,
            ]
        );
    }

   
}
