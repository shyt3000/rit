<?php

namespace app\models;

use Yii;
use app\models\Referal;

/**
 * This is the model class for table "user_db".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 */
class UserDb extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_db';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'authKey', 'accessToken'], 'required'],
            [['email', 'password', 'authKey', 'accessToken'], 'string', 'max' => 200],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
    
    public function getReferals(){
        return $this->hasMany(Referal::className(), ['user_id' => 'id'])
                ->select('referal.*, user_db.email')
                ->join('LEFT JOIN', 'user_db', 'referal_id = user_db.id')
                ->asArray()
                ->all() ;
    }
    
    public function getInviter(){
        return $this->hasOne(Referal::className(), ['referal_id' => 'id'])
                ->select('referal.*, user_db.email')
                ->join('LEFT JOIN', 'user_db', 'user_id = user_db.id')
                ->asArray()
                ->all() ;
    }

    public function getAuthKey(): string {
        return $this->authKey;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey): bool {
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null): \yii\web\IdentityInterface {
        throw new \yii\base\NotSupportedException();
    }
    
    public static function findByEmail($email){
        return self::findOne(['email' => $email]);
    }
    
    public function validatePassword($password){
        return $this->password === $password;
    }
    
    public function saveUser($email, $password, $authKey, $token, $referalId){
        $this->email = $email;
        $this->password = $password;
        $this->authKey = $authKey;
        $this->accessToken = $token;
        $this->save();
        
        $ref = new Referal();
        $ref->user_id = $referalId;
        $ref->referal_id = $this->id;
        $ref->save();
    }
    
    public function getRefs($id){
        $ref = new Referal();
        
        $result = [];
        $result['myId'] = $id->id;
        $result['myRefs'] = $ref::find()
                ->where('user_id = '.$id->id)
                ->all();
        
        $result['iRef'] = $ref::find()
                ->where(['referal_id' => $id->id])
                ->all();
        
        return $result;
        
    }

}
