<?php

namespace common\models;

use Egulias\EmailValidator\Warning\Comment;
use Yii;

use mohorev\file\UploadImageBehavior;
use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use gofuroov\multilingual\db\MultilingualQuery;
use zxbodya\yii2\galleryManager\GalleryBehavior;


/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $img
 * @property int $status
 * @property string $oldcost
 * @property string $newcost
 * @property string $discount
 *
 * @property ProductsLang[] $productsLangs
 */
class Products extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;
    use MultilingualLabelsTrait;

    public static function tableName()
    {
        return 'products';
    }


    public function rules()
    {
        return [
            [['name', 'content', 'oldcost', 'newcost'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['content'], 'string'],
            [['oldcost', 'newcost'], 'string', 'max' => 100],
            [['view_count', 'check', 'discount'], 'safe'],

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
                    'name', 'content'
                ]
            ],
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'product',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@frontend/web') . '/img/demos/auto-services/products',
                'url' => '/img/demos/auto-services/products',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
        ];
    }



    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
            'oldcost' => Yii::t('app', 'Oldcost'),
            'newcost' => Yii::t('app', 'Newcost'),
            'discount' => Yii::t('app', 'Discount'),
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



    public function getProductCount()
    {
        return $this->hasOne(Products::class, ['id' => 'id'])->count();
    }


    public function images($type = 'medium')
    {

        $images = [];

        foreach ($this->getBehavior('galleryBehavior')->getImages() as $image) {

            $images[] = $image->getUrl($type);
        }
        return $images;
    }

    public function image($type = 'medium')
    {
        $images = $this->images($type);

        if (empty($images)) {

            return '';
        }

        return $images[0];
    }

    public function getComment()
    {
        return $this->hasMany(Comments::class, ['product_id' => 'id']);
    }

    public function getCommentsCount()
    {
        return $this->hasMany(Comments::class, ['product_id' => 'id'])->count();
    }
}
