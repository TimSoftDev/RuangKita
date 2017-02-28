<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main">
    <div class="login">
        <div class="logo">
            <?= Html::img('@web/img/logo.png', ['alt' => 'Logo Universitas Sebelas Maret']); ?>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= \yiister\gentelella\widgets\FlashAlert::widget([
                'showHeader' => false
            ]); ?>

            <?= $form->field($model, 'email')
                ->label(false)
                ->textInput([
                    'placeholder' => $model->getAttributeLabel('email'),
                    'autofocus' => true,
            ]) ?>
            
            <?= $form->field($model, 'password')
                ->label(false)
                ->passwordInput([
                    'placeholder' => $model->getAttributeLabel('password'),
            ]) ?>
            
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-7">
                    <?= $form->field($model, 'rememberMe')->checkbox()->label('Ingat Saya') ?>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary btn-sm btn-block', 'name' => 'login-button']) ?>
                </div>
            
            </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="login-help">
        <span class="pull-left">Lupa password? <?= Html::a('Reset', ['site/request-password-reset']) ?>.</span>
        <span class="pull-right">Belum punya akun? <?= Html::a('Daftar', ['site/signup']) ?>.</span>
    </div>
</div>