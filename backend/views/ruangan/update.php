<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ruangan */

$this->title = 'Perbarui Pesanan: ' . $model->ruang;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ruang, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ruangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Menunggu Validasi' => 'Menunggu Validasi', 'Aktif' => 'Aktif', 'Sudah Selesai' => 'Sudah Selesai', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'validator')->textInput(['value' => Yii::$app->user->identity->nama, 'disabled' => 'disabled']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
