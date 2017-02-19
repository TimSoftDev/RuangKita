<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ruangan */

$this->title = 'Perbarui Pesanan: ' . $model->ruang;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ruang, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ruangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
