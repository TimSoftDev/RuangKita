<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;


$this->title = 'List Ruangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <?php   //for popup create window
     modal::begin([
         'header'=>'<h4>List Ruangan<h4>',
         'id'=>'modal',
         'size'=>'modal-lg',         
     ]);
     echo "<div id='modalContent'></div>";
     modal::end();   
    ?>

<!-- Calender view -->
     <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
  ));
    ?>
   
</div>