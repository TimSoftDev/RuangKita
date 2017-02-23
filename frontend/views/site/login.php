<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\SwitchInput;

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
                        'class' => 'form-control input-md'
                    ]) ?>

                <?= $form->field($model, 'password')
                    ->label(false)
                    ->passwordInput([
                        'placeholder' => $model->getAttributeLabel('password'),
                        'class' => 'form-control input-md'
                    ]) ?>


                <div class="row" style="margin-top: 32px">
                    <div class="col-md-3 col-sm-3">
                        <?= $form->field($model, 'rememberMe')
                            ->label(false)
                            ->widget(SwitchInput::classname(), [
                                'pluginOptions' => [
                                    'onText' => '<i class="glyphicon glyphicon-ok"></i>',
                                    'offText' => '<i class="glyphicon glyphicon-remove"></i>',
                                ],
                            ]) ?>
                    </div>

                    <div class="col-md-9 col-sm-9">
                        <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary btn-md btn-block', 'name' => 'login-button']) ?>
                    </div>

                </div>
                

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
