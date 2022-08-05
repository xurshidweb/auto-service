<?php

namespace common\models;

use Yii;

use mohorev\file\UploadImageBehavior;
use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use gofuroov\multilingual\db\MultilingualQuery;

/**
 * This is the model class for table "brandinfo".
 *
 * @property int $id
 * @property int $status
 * @property string $img
 *
 * @property BrandinfoLang[] $brandinfoLangs
 */
class Brandinfo extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'brandinfo';
    }


    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['content'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, html, webp'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
            'img' => Yii::t('app', 'Img'),
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
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'img',
                'scenarios' => ['default', 'create'],
                'path' => '@frontend/web/upload/{id}',
                'url' => '/frontend/web/upload/{id}',
                'thumbs' => [
                    'preview' => ['width' => 431],
                ],
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

    public function getImageUrl()
    {
        return $this->getUploadUrl('img');
    }
}
