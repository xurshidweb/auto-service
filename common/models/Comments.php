<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property int $status
 */
class Comments extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;

    public static function tableName()
    {
        return 'comments';
    }


    public function rules()
    {
        return [
            [['name', 'email', 'message'], 'required'],
            [['message'], 'string'],
            [['status', 'created_at', 'updated_at', 'product_id'], 'integer'],
            [['email'], 'email'],
            [['view_count'], 'safe'],
            [['name', 'email'], 'string', 'max' => 100],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'message' => Yii::t('app', 'Message'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
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

    public function getProduct()
    {
        return $this->hasOne(Products::class, ['id' => 'product_id']);
    }
}
