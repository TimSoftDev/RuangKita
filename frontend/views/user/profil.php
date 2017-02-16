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
            echo Html::img('@web/'.$model->foto, ['class' => 'img-thumbnail', 'style' => 'width: 300px; height: 300px; margin: 0 20px 20px;', 'alt' => $model->username]);
          } else {
              echo Html::img('@web/uploads/foto-300.jpg', ['class' => 'img-thumbnail', 'style' => 'width: 300px; height: 300px; margin: 0 20px 20px;', 'alt' => $model->username]);
          }   
        ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-7">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
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
            <?= Html::a('Sunting Profil', ['sunting', 'id' => $model->id], ['class' => 'btn btn-flat btn-primary']) ?>

            <?php
              Modal::begin([
                  'header' => '<h3>' . $model->nama_depan . ' ' . $model->nama_belakang .'</h3>',
                  'footer' => 'Ini adalah footer',
                  'toggleButton' => ['label' => 'Ganti Foto', 'class' => 'btn btn-flat btn-default'],
              ]);

              echo 'Ini adalah sebuah modal...';

              Modal::end();
            ?>
        </p>
    </div>
</div>

