<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_product_item".
 *
 * @property int $id
 * @property int $order_product_id
 * @property int $product_id
 * @property int $title
 * @property int $price
 * @property int $count
 * @property int $total_count
 *
 * @property OrderProduct $orderProduct
 * @property Product $product
 */
class OrderProductItem extends \yii\db\ActiveRecord
{
   
    public static function tableName()
    {
        return 'order_product_item';
    }

   
    public function rules()
    {
        return [
            [['order_product_id', 'product_id'], 'required'],
            [['order_product_id', 'product_id', 'price', 'count'], 'integer'],
            [['order_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderProduct::class, 'targetAttribute' => ['order_product_id' => 'id']],
            [['title'], 'string'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_product_id' => Yii::t('app', 'Order Product ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'title' => Yii::t('app', 'Title'),
            'price' => Yii::t('app', 'Price'),
            'count' => Yii::t('app', 'Count'),
            'total_count' => Yii::t('app', 'Total Count'),
        ];
    }

    /**
     * Gets query for [[OrderProduct]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProduct()
    {
        return $this->hasOne(OrderProduct::class, ['id' => 'order_product_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::class, ['id' => 'product_id']);
    }
}
