<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quarters".
 *
 * @property int $id
 * @property int $district_id
 * @property string|null $name
 */
class Quarters extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'quarters';
    }

    public function rules()
    {
        return [
            [['district_id'], 'required'],
            [['district_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    public function getDistricts()
    {
        return $this->hasOne(Districts::class, ['id' => 'district_id']);
    }
}
