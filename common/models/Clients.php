<?php

namespace common\models;

use Yii;

use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use gofuroov\multilingual\db\MultilingualQuery;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property int $status
 *
 * @property ClientsLang[] $clientsLangs
 */
class Clients extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'clients';
    }


    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['content'], 'string'],
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
                    'title', 'content',
                ]
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
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
