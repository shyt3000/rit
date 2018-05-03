<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::a('Ваша реферальная ссылка', Url::to(['referal/registration', 'refcode' => $myId]))."<br><br>";


if(isset($referals)){
    echo "Мои рефералы:<hr>";
    foreach ($referals as $referal){
        print_r($referal['email']);
        echo '<br>';
    }
}

if(isset($inviter[0]['email'])){
    echo "<b>Меня пригласил: ".$inviter[0]['email']."<b>";
}

