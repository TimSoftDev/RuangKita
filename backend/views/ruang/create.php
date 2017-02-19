<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Ruang */

$this->title = 'Tambah Ruang';
$this->params['breadcrumbs'][] = ['label' => 'Ruang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
