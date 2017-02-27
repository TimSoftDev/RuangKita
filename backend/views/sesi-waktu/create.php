<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SesiWaktu */

$this->title = 'Create Sesi Waktu';
$this->params['breadcrumbs'][] = ['label' => 'Sesi Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesi-waktu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
