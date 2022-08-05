<?php

namespace common\models;

use Yii;

use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use gofuroov\multilingual\db\MultilingualQuery;

/**
 * This is the model class for table "category_services".
 *
 * @property int $id
 * @property int $status
 *
 * @property CategoryServicesLang[] $categoryServicesLangs
 * @property Service[] $services
 */
class CategoryServices extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'category_services';
    }


    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 100],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
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
                    'title',
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


    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::class, ['owner_id' => 'id']);
    }
}
