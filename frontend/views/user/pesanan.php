<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;


$this->title = 'List Ruangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-index">    

    <?php   
     modal::begin([
         'header'=>'<h4>List Ruangan<h4>',
         'id'=>'modal',
         'size'=>'modal-lg',         
     ]);
     echo "<div id='modalContent'></div>";
     modal::end();   
    ?>

     <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
        'options' => [
            'lang' => 'id',
        ],
        'events'=> $ruang,
    )); ?>
   
</div>