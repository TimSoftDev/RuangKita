<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->ruang . ' --- [' . $model->id . ']';

?>
<div class="main">

    <p>
        <?= Html::a('<< Kembali', ['pesanan/index'], ['class' => 'btn btn-default']) ?>
        <?php if ($model->status == 'Menunggu Validasi') {
	        echo Html::a('Hapus', ['delete', 'id' => $model->id], [
	            'class' => 'btn btn-danger',
	            'data' => [
	                'confirm' => 'Yakin ingin menghapus data tersebut?',
	                'method' => 'post',
	            ],
	        ]);
	    } ?>
        
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
        ],
    ]) ?>

</div>
