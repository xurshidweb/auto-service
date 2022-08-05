<?php

namespace frontend\controllers;

use common\models\Blog;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class BlogController extends Controller
{

    public function actionIndex()
    {
        $query = Blog::find()->where(['status' => 1]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);


        $blogs = $dataProvider->models;
        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider,
                'blogs' => $blogs,
            ]
        );
    }

    public function actionDetail()
    {
        $id = Yii::$app->request->get('id');
        $query = Blog::find()->where(['status' => 1, 'owner_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);


        $blogs = $dataProvider->models;
        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider,
                'blogs' => $blogs,
            ]
        );
    }
}
