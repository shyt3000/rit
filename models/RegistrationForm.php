<?php

namespace app\models;

use yii\base\Model;

class RegistrationForm extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            [['email'], 'unique', 'targetClass' => 'app\models\UserDB']
       ];
    }
}