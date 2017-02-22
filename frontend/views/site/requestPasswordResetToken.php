<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Lupa Password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header text-center">
            <img src="https://sso.uns.ac.id/module.php/uns/img/logo-uns.png" alt="Logo Universitas Sebelas Maret">
        </div>
        <div class="modal-footer">
            <?php $form = ActiveForm::begin([

                'id' => 'request-password-reset-form',
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

      
                <?= Html::submitButton('Reset', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'reset-button']) ?>

                <span class="pull-left">
                    Ingat password? 
                    <?= Html::a('Masuk', ['site/login']) ?>
                </span>
                <span class="pull-right">
                    Belum punya akun? 
                    <?= Html::a('Daftar', ['site/signup']) ?>
                </span>

            <?php ActiveForm::end(); ?>
            
        </div>
    </div>
</div>