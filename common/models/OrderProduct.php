<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order_product".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $region
 * @property string $district
 * @property string $mfy
 * @property string $street
 * @property string $phone
 * @property string $email
 * @property string $message
 * @property int $created_at
 * @property int $updated_at
 *
 * @property OrderProductItem[] $orderProductItems
 * @property User $user
 */
class OrderProduct extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order_product';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => 'user_id',
                'createdByAttribute' => 'user_id'
            ]
        ];
    }


    public function rules()
    {
        return [
            [['first_name', 'last_name', 'region', 'district', 'mfy', 'street', 'phone', 'email', 'message'], 'required'],
            [['user_id', 'created_at', 'updated_at', 'total_sum'], 'integer'],
            [['message'], 'string'],
            [['first_name', 'last_name', 'region', 'district', 'street', 'phone', 'email'], 'string', 'max' => 200],
            [['mfy'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'region' => Yii::t('app', 'Region'),
            'district' => Yii::t('app', 'District'),
            'mfy' => Yii::t('app', 'Mfy'),
            'street' => Yii::t('app', 'Street'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'message' => Yii::t('app', 'Message'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[OrderProductItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProductItems()
    {
        return $this->hasMany(OrderProductItem::class, ['order_product_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
