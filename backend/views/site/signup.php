<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

$this->title = 'Daftar Admin';
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

            <div class="text-center text-primary" style="margin-bottom: 32px">
                <p>Mohon diisi sesuai dengan data yang sebenar-benarnya. <br />
                    Data yang telah dimasukkan tidak dapat diubah kembali.
                </p>
            </div>

            <?php $form = ActiveForm::begin([

                'id' => 'signup-form',
                'options' => [
                    'class' => 'form col-md-12 center-block'
                ]

            ]); ?>

                <?= $form->field($model, 'nama')
                    ->label(false)
                    ->textInput([
                        'placeholder' => $model->getAttributeLabel('nama'),
                        'class' => 'form-control input-lg'
                    ]) ?>

                <?= $form->field($model, 'username')
                    ->label(false)
                    ->textInput([
                        'placeholder' => $model->getAttributeLabel('username'),
                        'class' => 'form-control input-lg'
                    ]) ?>

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

      
                <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'signup-button']) ?>

                <span class="pull-left">
                    Sudah punya akun? 
                    <?= Html::a('Masuk', ['site/login']) ?>
                </span>
                <span class="pull-right">
                    Lupa password? 
                    <?= Html::a('Lupa password', ['site/request-password-reset']) ?>
                </span>

            <?php ActiveForm::end(); ?>
            
        </div>
    </div>
</div>