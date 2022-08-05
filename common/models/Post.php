<?php

namespace common\models;

use Yii;

use mohorev\file\UploadImageBehavior;
use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use gofuroov\multilingual\db\MultilingualQuery;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $img
 * @property int $comments
 * @property string $date
 * @property string $by
 * @property int $status
 *
 * @property Blog[] $blogs
 * @property PostLang[] $postLangs
 */
class Post extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    use MultilingualLabelsTrait;


    public static function tableName()
    {
        return 'post';
    }


    public function rules()
    {
        return [
            [['title'], 'required'],
            [['comments', 'status',], 'integer'],
            [['content'], 'string'],
            [['content', 'date', 'by', 'comments'], 'safe'],
            [['date', 'by', 'title'], 'string', 'max' => 100],
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
            'by' => Yii::t('app', 'By'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Blogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::class, ['owner_id' => 'id']);
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

    public function getBlogCount()
    {
        return $this->hasMany(Blog::class, ['owner_id' => 'id'])->count();
    }
}
