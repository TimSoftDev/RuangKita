<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SesiWaktu */

$this->title = 'Update Sesi Waktu: ' . $model->sesi;
$this->params['breadcrumbs'][] = ['label' => 'Sesi Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sesi, 'url' => ['view', 'id' => $model->sesi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sesi-waktu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
