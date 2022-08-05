<?php

namespace common\models;

use Yii;

use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use gofuroov\multilingual\db\MultilingualQuery;

/**
 * This is the model class for table "navbar".
 *
 * @property int $id
 *
 * @property NavbarLang[] $navbarLangs
 */
class Navbar extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'navbar';
    }


    public function rules()
    {
        return [
            [['home', 'about', 'services', 'products', 'blog', 'appointment', 'contact'], 'required'],
            [['home', 'about', 'services', 'products', 'blog', 'appointment', 'contact'], 'string', 'max' => 100],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
        ];
    }

    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'languages' => [
                    'en' => 'Eng',
                    'uz' => 'Uzb',
                ],
                'attributes' => [
                    'home', 'about', 'services', 'products', 'blog', 'appointment', 'contact'
                ]
            ],
        ];
    }
    public static function find()
    {
        return (new MultilingualQuery(get_called_class()))->multilingual();
    }


    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Faol'),
            self::STATUS_NO_ACTIVE => Yii::t('app', 'Faol Emas'),
        ];
    }

    public function getStatusLabel()
    {
        return $this->statuses()[$this->status];
    }
}
