<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\Prodi;
use kartik\widgets\FileInput;

$this->title = 'Daftar';
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
                    Data yang telah dimasukkan tidak dapat diubah kembali, <br/>
                    disarankan untuk menggunakan foto persegi.
                </p>
            </div>

            <?php $form = ActiveForm::begin([

                'id' => 'signup-form',
                'options' => [
                    'class' => 'form col-md-12 center-block',
                    'enctype' => 'multipart/form-data'
                ]

            ]); ?>

                <?= $form->field($model, 'nim')
                    ->label(false)
                    ->textInput([
                        'placeholder' => $model->getAttributeLabel('nim'),
                        'autofocus' => true,
                        'class' => 'form-control input-lg'
                    ]) ?>

                <?= $form->field($model, 'nama_depan')
                    ->label(false)
                    ->textInput([
                        'placeholder' => $model->getAttributeLabel('nama_depan'),
                        'class' => 'form-control input-lg'
                    ]) ?>

                <?= $form->field($model, 'nama_belakang')
                    ->label(false)
                    ->textInput([
                        'placeholder' => $model->getAttributeLabel('nama_belakang'),
                        'class' => 'form-control input-lg'
                    ]) ?>

                <?= $form->field($model, 'prodi')
                    ->label(false)
                    ->dropDownList(ArrayHelper::map(Prodi::find()->all(),
                    'nama', 'nama'),
                    [
                        'prompt' => 'Pilih Prodi',
                        'class' => 'form-control input-lg'
                    ]
                ) ?>

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


                <?= $form->field($model, 'foto')
                    ->label(false)
                    ->widget(FileInput::classname(), [
                        'language' => 'id',
                        'pluginOptions' => [
                            'showCaption' => false,
                            'showRemove' => false,
                            'showUpload' => false,
                            'browseClass' => 'btn btn-warning btn-block',
                            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                            'browseLabel' =>  'Foto Profil'
                        ],
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