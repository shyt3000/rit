<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

use app\models\RegistrationForm;
use app\models\UserDb;
use app\models\LoginForm;

class ReferalController extends Controller
{
    public function actionIndex(){
        if (!Yii::$app->user->isGuest) {
            $u = UserDb::findOne(Yii::$app->user->identity->id);
            $myId = Yii::$app->user->identity->id;
            $referals = $u->getReferals();
            
            $inviter = $u->getInviter();
            
            return $this->render('cabinet', compact('referals', 'myId', 'inviter'));
        }
    }
    public function actionRegistration(){
        
        $refCode = Yii::$app->request->get('refcode');
                
        $model = new RegistrationForm();
        
        $userDb = new UserDb();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $referalId = $userDb->findIdentity($refCode) ? $userDb->findIdentity($refCode)->id : null;
            
            $userDb->saveUser($model->email, $model->password, 
                                $model->email."_Key", $model->email."_Token", $referalId);
            
            $u = UserDb::findOne($userDb->id);
           
            $referals = $u->getReferals();
            
            $myId = $userDb->id;
            $inviter = $u->getInviter();
            return $this->render('cabinet', compact('referals', 'u', 'myId', 'inviter'));
            
        } else {
                            
            $referalEmail = $userDb->findIdentity($refCode) ? $userDb->findIdentity($refCode)->email : null;
            
            return $this->render('registration', compact('referalEmail', 'model'));
        
        }        
        
    }
    
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            $userDb = new UserDb();
            $myId = Yii::$app->user->identity->id;
            
            $u = UserDb::findOne($myId);
           
            $referals = $u->getReferals();
            $inviter = $u->getInviter();
            return $this->render('cabinet', compact('referals', 'myId', 'inviter'));
            
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        return $this->goHome();
    }
    
    
}

