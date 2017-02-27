<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset Password';
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

                <?= $form->field($model, 'password')
                    ->label(false)
                    ->passwordInput([
                        'placeholder' => $model->getAttributeLabel('password'),
                        'class' => 'form-control input-lg'
                    ]) ?>

      
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'reset-button']) ?>

            <?php ActiveForm::end(); ?>
            
        </div>
    </div>
</div>