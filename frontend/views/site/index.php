<?php

/* @var $this yii\web\View */

$this->title = 'Sistem Peminjaman Ruang';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Hallo, <strong><?= Yii::$app->user->identity->nama_depan ?></strong></h1>

        <p class="lead">Kamu masuk dengan menggunakan email <a><?= Yii::$app->user->identity->email ?></a></p>

        <p><a class="btn btn-lg btn-success" href="user/profil">Profil</a></p>
    </div>

    <div class="body-content">
    <code><?= __FILE__ ?></code>
    </div>
</div>
