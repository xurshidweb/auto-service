<?php

namespace common\models;

use Yii;

use mohorev\file\UploadImageBehavior;
use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use gofuroov\multilingual\db\MultilingualQuery;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $img
 * @property int $comments
 * @property string $date
 * @property int $status
 *
 * @property BlogLang[] $blogLangs
 */
class Blog extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'blog';
    }

    public function rules()
    {
        return [
            [['content', 'title', 'by'], 'required'],
            [['comments', 'status', 'owner_id'], 'integer'],
            [['title', 'by', 'date'], 'string', 'max' => 100],
            [['content'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, html, webp,svg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Img'),
            'comments' => Yii::t('app', 'Comments'),
            'date' => Yii::t('app', 'Date'),
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

    public function getOwner()
    {
        return $this->hasOne(Post::class, ['id' => 'owner_id']);
    }
}
