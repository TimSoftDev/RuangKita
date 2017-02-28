<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->ruang . ' --- [' . $model->id . ']';

?>
<div class="data-tampilkan">

    <p>
        <?= Html::a('Perbarui', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Yakin ingin menghapus data tersebut?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<< Kembali', ['data/index'], ['class' => 'btn btn-default pull-right']) ?>
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
