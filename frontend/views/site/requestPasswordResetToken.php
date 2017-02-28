<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset Password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main">
    <div class="login">
        <div class="logo">
            <?= Html::img('@web/img/logo.png', ['alt' => 'Logo Universitas Sebelas Maret']); ?>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= \yiister\gentelella\widgets\FlashAlert::widget([
                'showHeader' => true
            ]); ?>

            <?= $form->field($model, 'email')
                ->label(false)
                ->textInput([
                    'placeholder' => $model->getAttributeLabel('email'),
                    'autofocus' => true,
            ]) ?>
            
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?= Html::submitButton('Reset', ['class' => 'btn btn-primary btn-sm btn-block', 'name' => 'reset-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="login-help">
        <span class="pull-left">Ingat password? <?= Html::a('Masuk', ['site/login']) ?>.</span>
        <span class="pull-right">Belum punya akun? <?= Html::a('Daftar', ['site/signup']) ?>.</span>
    </div>
</div>