<?php


namespace backend\modules\menumanager\controllers;
use common\models\AboutCategory;
use common\models\Leadersid;
use common\models\Newsid;
use common\models\Page;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;

class MenuController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }




    public function actionGetValue()
    {

        $options = '';
        $type = $_GET['type'];
        if ($type == 'news') {
            $options = $this->news();
        }

        if ($type == 'leaders') {
            $options = $this->leaders();
        }
        if ($type == 'portfolios') {
            $options = $this->portfolios();
        }

        if ($type == 'page') {
            $options = $this->pages();
        }
        if ($type == 'interactive_services') {
            $options = $this->interactive();
        }

        if ($type == 'c-action') {
            $options = $this->sections();
        }

        return Html::tag('select', $options, [
            'id' => 'tree-url_value',
            'class' => 'form-control',
            'name' => 'Menu[url_value]'
        ]);

    }

    private function news()
    {

        $categories = Newsid::find()->all();
        $options = Html::tag('option', "Maqola kategoriyani...");
        foreach ($categories as $category) {
            $options .= Html::tag('option', $category->title_uz, ['value' => $category->slug]);
        }

        return $options;
    }

    private function leaders()
    {
        $leaders = AboutCategory::find()->all();
        $options = Html::tag('option', "Rahbariyat kategoriyasi...");
        foreach ($leaders as $leader) {
            $options .= Html::tag('option', $leader->title, ['value' => $leader->slug]);
        }
        return $options;
    }


    private function pages()
    {
        $pages = Page::find()->all();
        $options = Html::tag('option', "Sahifani tanlang...");
        foreach ($pages as $page) {
            $options .= Html::tag('option', $page->title_uz, ['value' => $page->slug]);
        }
        return $options;
    }

    private function sections()
    {
        $sections = Yii::$app->getModule('menumanager')->sections();
        $options = Html::tag('option', "Sahifani tanlang ... ");
        foreach ($sections as $route => $label) {
            $options .= Html::tag('option', $label, ['value' => $route]);
        }
        return $options;
    }

}