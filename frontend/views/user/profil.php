<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;


$this->title = 'Profil' ;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

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
                    'value' => $model->nama_depan . ' ' . $model->nama_belakang,
                ], 
                [                      
                    'label' => 'Username' ,
                    'value' => '@' . $model->username,
                ],
                'email:email',
            ],
        ]) ?>
        <p>
            <?php
              Modal::begin([
                  'header' => '<h3>' . $model->nama_depan . ' ' . $model->nama_belakang .'</h3>',
                  'footer' => date('l, d M Y h:i'),
                  'toggleButton' => ['label' => 'Lihat Pesananku', 'class' => 'btn btn-flat btn-primary'],
              ]);

              echo 'Ini adalah sebuah modal...';

              Modal::end();
            ?>
        </p>
    </div>
</div>

