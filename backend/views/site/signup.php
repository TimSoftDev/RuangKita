<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\Prodi;
use kartik\widgets\FileInput;

$this->title = 'Daftar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main">
    <div class="login" style="max-width: 480px;">
        <div class="logo">
            <?= Html::img('@web/img/logo.png', ['alt' => 'Logo Universitas Sebelas Maret']); ?>
        </div>
        <?php $form = ActiveForm::begin([
            'id' => 'signup-form',
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]); ?>

            <div class="text-center text-primary">
                <p>Mohon diisi sesuai dengan data yang sebenar-benarnya.
                    Data yang telah dimasukkan tidak dapat diubah kembali, 
                    disarankan untuk menggunakan foto persegi.
                </p>
            </div>

            <div class="row" style="margin-top: 0">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $form->field($model, 'nama_depan')
                        ->label(false)
                        ->textInput([
                            'placeholder' => $model->getAttributeLabel('nama_depan')
                        ]) ?>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $form->field($model, 'nama_belakang')
                        ->label(false)
                        ->textInput([
                            'placeholder' => $model->getAttributeLabel('nama_belakang'),
                            'class' => 'form-control margin-top-xs'
                        ]) ?>
                </div>
            </div>

            <?= $form->field($model, 'nim')
                ->label(false)
                ->textInput([
                    'placeholder' => $model->getAttributeLabel('nim'),
                    'autofocus' => true,
                    'style' => 'margin-top: 5px;'
                ]) ?>

            <?= $form->field($model, 'prodi')
                ->label(false)
                ->dropDownList(ArrayHelper::map(Prodi::find()->all(),
                'nama', 'nama'),
                [
                    'prompt' => 'Pilih Prodi'
                ]
            ) ?>

            <?= $form->field($model, 'username')
                ->label(false)
                ->textInput([
                    'placeholder' => $model->getAttributeLabel('username')
                ]) ?>

            <?= $form->field($model, 'email')
                ->label(false)
                ->textInput([
                    'placeholder' => $model->getAttributeLabel('email'),
                    'autofocus' => true
                ]) ?>

            <?= $form->field($model, 'password')
                ->label(false)
                ->passwordInput([
                    'placeholder' => $model->getAttributeLabel('password')
                ]) ?>

                
            <div class="row">            
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?= $form->field($model, 'foto')
                    ->label(false)
                    ->widget(FileInput::classname(), [
                        'language' => 'id',
                        'pluginOptions' => [
                            'showCaption' => false,
                            'showRemove' => false,
                            'showUpload' => false,
                            'browseClass' => 'btn btn-warning btn-sm btn-block',
                            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                            'browseLabel' =>  'Foto Profil'
                        ],
                ]) ?>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary btn-sm btn-block', 'name' => 'signup-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="login-help" style="max-width: 480px">
        <span class="pull-left">Punya akun? <?= Html::a('Masuk', ['site/login']) ?>.</span>
        <span class="pull-right">Lupa password? <?= Html::a('Reset', ['site/request-password-reset']) ?>.</span>
    </div>
</div>