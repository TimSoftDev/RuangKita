<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Profil' ;
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 text-center">
        <?php
          if ($model->foto!='') {
            echo Html::img($model->foto, ['class' => 'img-thumbnail', 'style' => 'width: 300px; height: 300px; margin: 0 20px 20px;', 'alt' => $model->username]);
          } else {

            echo Html::img('@web/uploads/default.jpg', ['class' => 'img-thumbnail', 'style' => 'width: 300px; height: 300px; margin: 0 20px 20px;', 'alt' => $model->username]);
        } ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-7">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [                      
                    'label' => 'NIM' ,
                    'value' => $model->nim,
                ], 
                [                      
                    'label' => 'Nama' ,
                    'value' => strtoupper($model->nama_depan . ' ' . $model->nama_belakang),
                ],
                [                      
                    'label' => 'Prodi' ,
                    'value' => strtoupper($model->prodi),
                ], 
                [                      
                    'label' => 'Username' ,
                    'value' => '@' . $model->username,
                ],
                'email:email',

                [                      
                    'label' => 'Pemesanan' ,
                    'value' => 'Diterima ' . $aktif . ' dari ' . $pesanan . ' pesanan',
                ],
            ],
        ]) ?>

        <div>
            <?= Html::a('Pesan Sekarang', ['pesanan/pesan'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Lihat Pesananku', ['user/index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

