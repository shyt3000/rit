<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "referal".
 *
 * @property int $id
 * @property int $user_id
 * @property int $referal_id
 */
class Referal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'referal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'referal_id'], 'required'],
            [['user_id', 'referal_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'referal_id' => 'Referal ID',
        ];
    }
    
    public function getUser(){
        return $this->hasOne(UserDb::className(), ['user_id' => 'id']);
    }
}
