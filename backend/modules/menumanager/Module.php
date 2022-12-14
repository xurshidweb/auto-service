<?php

namespace backend\modules\menumanager;

/**
 * menumanager module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\menumanager\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * Menu uchun sayt bo'limlari
     */
    public function sections()
    {
        return [
               'site/news' => "Rahbariyat",
//            'site/regions' => "Hududiy boshqarmalar",
               'site/news' => 'Yangiliklar',
//            'leader/index' => 'Rahbariyat',
//            'privatization/index' => 'Xususiylashtirish',
//            'state-enterprise/index' => 'Davlat ishtirokidagi korxonalar',
//            'rent/index' => 'Ijaralar',
//            'site/video' => 'Video materiallar',
//            'open-data/index' => 'Ochiq ma\'lumotlar',
//            '#contact' => 'Contact',
        ];

    }
}
