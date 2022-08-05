<?php

namespace common\models;

use Yii;
use mohorev\file\UploadImageBehavior;

/**
 * This is the model class for table "brandsimage".
 *
 * @property int $id
 * @property string $img
 * @property int $status
 */
class Brandsimage extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;

    public static function tableName()
    {
        return 'brandsimage';
    }


    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'integer'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, html, webp,svg'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Img'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    public function behaviors()
    {
        return [
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
