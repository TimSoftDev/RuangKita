<?php

/* @var $this yii\web\View */

$this->title = 'Sistem Peminjaman Ruang';
?>
<div class="user-index">

    <div class="jumbotron">
        <h1>Hallo, <strong><?= Yii::$app->user->identity->nama_depan . ' ' . Yii::$app->user->identity->nama_belakang ?></strong></h1>

        <p class="lead">Kamu masuk dengan menggunakan email <a><strong><?= Yii::$app->user->identity->email ?></strong>.</a></p>
    </div>
</div>
