<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property int $phone
 * @property string $model
 * @property string $color
 * @property int $year
 * @property string $message
 * @property string $date1
 * @property string $time1
 * @property string $date2
 * @property string $time2
 */
class Order extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order';
    }


    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'phone', 'model', 'color', 'year', 'message', 'date1', 'time1', 'date2', 'time2'], 'required'],
            [['phone', 'year'], 'integer'],
            [['message'], 'string'],
            [['email'], 'email'],
            [['first_name', 'last_name', 'email', 'model', 'color', 'date1', 'time1', 'date2', 'time2'], 'string', 'max' => 100],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'model' => Yii::t('app', 'Model'),
            'color' => Yii::t('app', 'Color'),
            'year' => Yii::t('app', 'Year'),
            'message' => Yii::t('app', 'Message'),
            'date1' => Yii::t('app', 'Date 1'),
            'time1' => Yii::t('app', 'Time 1'),
            'date2' => Yii::t('app', 'Date 2'),
            'time2' => Yii::t('app', 'Time 2'),
        ];
    }
}
