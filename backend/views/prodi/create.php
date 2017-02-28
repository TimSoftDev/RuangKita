<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Fakultas;


$this->title = 'Tambah Prodi';

?>
<div class="main">
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_fakultas')
    	->label('Fakultas')
        ->dropDownList(ArrayHelper::map(Fakultas::find()
        ->all(),
        'id', 'nama'),
        ['prompt' => '=== PILIH FAKULTAS ===']
    ) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Tambah', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>