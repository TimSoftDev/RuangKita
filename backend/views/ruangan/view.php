<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ruangan */

$this->title = $model->ruang;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Perbarui', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nim_mahasiswa',
            'ruang',
            'no_surat',
            'waktu_mulai',
            'waktu_selesai',
            'status',
            'waktu_pesan',
            'waktu_validasi',
            'validator',
        ],
    ]) ?>

</div>
