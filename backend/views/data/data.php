<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yiister\gentelella\widgets\Panel;
use common\models\Ruang;


$this->title = $title;

?>
<div class="main">

	<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
	    'options' => [
	        'lang' => 'id'
	    ],
	    'events' => $ruang,
	    'header' => [               
	        'center'=>'title',
	        'left'=>'prev next today',        
	        'right'=>'agendaDay agendaWeek listMonth'
	    ]
	)); ?>

</div>