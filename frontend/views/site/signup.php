<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\Prodi;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'nim')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'nama_depan') ?>

                <?= $form->field($model, 'nama_belakang') ?>

                <?= $form->field($model, 'id_prodi')
                    ->dropDownList(ArrayHelper::map(Prodi::find()->all(),
                    'id', 'nama'),
                    ['prompt' => '=== Pilih Prodi ===']
                ) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'foto')->fileInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
