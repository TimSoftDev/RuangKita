<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header text-center">
            <img src="https://sso.uns.ac.id/module.php/uns/img/logo-uns.png" alt="Logo Universitas Sebelas Maret">
        </div>
        <div class="modal-footer">
        
            <?= \yiister\gentelella\widgets\FlashAlert::widget([
                'showHeader' => true
            ]); ?>

            <?php $form = ActiveForm::begin([

                'id' => 'login-form',
                'options' => [
                    'class' => 'form col-md-12 center-block'
                ]

            ]); ?>

                <?= $form->field($model, 'email')
                    ->label(false)
                    ->textInput([
                        'placeholder' => $model->getAttributeLabel('email'),
                        'autofocus' => true,
                        'class' => 'form-control input-lg'
                    ]) ?>

                <?= $form->field($model, 'password')
                    ->label(false)
                    ->passwordInput([
                        'placeholder' => $model->getAttributeLabel('password'),
                        'class' => 'form-control input-lg'
                    ]) ?>

                
                <?= $form->field($model, 'rememberMe')
                    ->label('Ingat saya')
                    ->checkbox() ?>
      
                <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>

                <span class="pull-left">
                    Lupa password? 
                    <?= Html::a('Reset', ['site/request-password-reset']) ?>
                </span>
                <span class="pull-right">
                    Belum punya akun? 
                    <?= Html::a('Daftar', ['site/signup']) ?>
                </span>

            <?php ActiveForm::end(); ?>
            
        </div>
    </div>
</div>
