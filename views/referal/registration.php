<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<p>Регистрация:</p>
<?php 
    if($referalEmail){
        echo 'Вас пригласил: '.$referalEmail;
    }

    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

    
<?php

?>
