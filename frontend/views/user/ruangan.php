<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;


$this->title = 'List Ruangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-index">    

    <div class="">

    <p>
        <?= Html::a('Pesan Sekarang', ['tambah'], ['class' => 'btn btn-success']) ?>
    </p>

    </div>

     <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
        'options' => [
            'lang' => 'id',
        ],
        'clientOptions' => [
            'selectable' => true,
        ],
        'events'=> $ruang,
    )); ?>
   
</div>