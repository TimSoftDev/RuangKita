<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Ganti Password';
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
            
            <?= $form->field($model, 'password')
                ->label(false)
                ->passwordInput([
                    'placeholder' => $model->getAttributeLabel('password'),
            ]) ?>
            
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?= Html::submitButton('Ganti', ['class' => 'btn btn-primary btn-sm btn-block', 'name' => 'ganti-button']) ?>
                </div>
            
            </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="login-help">
        <span>Ingat password? <?= Html::a('Masuk', ['site/login']) ?>.</span>
    </div>
</div>