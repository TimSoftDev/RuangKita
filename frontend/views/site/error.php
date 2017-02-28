<?php

use yii\helpers\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main">
    <div class="login">
        <div class="logo">
            <?= Html::img('@web/img/logo.png', ['alt' => 'Logo Universitas Sebelas Maret']); ?>
        </div>
        <div class="text-center">
        	<h1>404</h1>

	        <p>
	        	Maaf, Halaman yang anda cari tidak ditemukan.
	        </p>
	        
        </div>

    </div>

    <div class="login-help">
        <span class="pull-left">Kembali ke <?= Html::a('Dashboard', ['user/index']) ?>.</span>
    </div>
</div>