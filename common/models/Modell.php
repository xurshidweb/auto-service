<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "modell".
 *
 * @property int $id
 * @property string $title
 * @property int $status
 */
class Modell extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_NO_ACTIVE = 0;

    public static function tableName()
    {
        return 'modell';
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
            'title' => Yii::t('app', 'Title'),
            'status' => Yii::t('app', 'Status'),
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
}
