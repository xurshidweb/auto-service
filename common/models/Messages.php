<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 */
class Messages extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'messages';
    }

    
    public function rules()
    {
        return [
            [['name', 'email', 'message'], 'required'],
            [['message'], 'string'],
            [['email'],'email'],
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
        ];
    }
}
