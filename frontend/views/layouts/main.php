<?php

use yii\helpers\Html;
use yiister\gentelella\widgets\Panel;
use common\models\Ruangan;

if (Yii::$app->controller->action->id === 'error' ||
    Yii::$app->controller->action->id === 'login' ||
    Yii::$app->controller->action->id === 'request-password-reset' ||
    Yii::$app->controller->action->id === 'reset-password' ||
    Yii::$app->controller->action->id === 'signup'

) { 
    echo $this->render(
        'main-clean',
        ['content' => $content]
    );
} else {

$bundle = yiister\gentelella\assets\Asset::register($this);
$_home = Yii::$app->homeUrl;
$_nim = Yii::$app->user->identity->nim;
$_email = Yii::$app->user->identity->email;
$_depan = Yii::$app->user->identity->nama_depan;
$_belakang = Yii::$app->user->identity->nama_belakang;
$_foto = Yii::$app->user->identity->foto;

if ($_foto == '') {
    $_foto = '@web/uploads/default.jpg';
}

$aktif = Ruangan::find()
    ->where(['status' => 'Aktif'])
    ->andWhere(['nim_mahasiswa' => $_nim])
    ->count();

$menunggu = Ruangan::find()
    ->where(['status' => 'Menunggu Validasi'])
    ->andWhere(['nim_mahasiswa' => $_nim])
    ->count();

$nonaktif = Ruangan::find()
    ->where(['between', 'waktu_selesai', 0, date('Y-m-d H:i')])
    ->andWhere(['status' => 'Aktif'])
    ->andWhere(['nim_mahasiswa' => $_nim])
    ->count();

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-md">
<?php $this->beginBody(); ?>
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title">
                    <a href="<?= $_home ?>" class="site_title"><i class="fa fa-home"></i> <span>Pinjam Ruangan</span></a>
                </div>
                <div class="clearfix"></div>
                <div class="profile">
                    <div class="profile_pic">                         
                        <?= Html::img($_foto, ['class' => 'img-circle profile_img', 'alt' => $_email, 'style' => 'height: 56.35px']); ?>
                    </div>
                    <div class="profile_info">
                        <span>Peminjaman Ruang,</span>
                        <h2><?= $_depan ?></h2>
                    </div>
                </div>
                <br />
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <?= Html::tag('h3', '-------------------------------------') ?>
                        <?= \yiister\gentelella\widgets\Menu::widget([
                            'items' => [
                                ['label' => 'Dashboard', 'url' => ['user/index'], 'icon' => 'dashboard'],
                                ['label' => 'Monitor Ruangan', 'url' => ['/user/ruangan'], 'icon' => 'laptop'],
                                [
                                    'label' => 'Pesananku',
                                    'url' => '#',
                                    'icon' => 'bar-chart',
                                    'items' => [
                                        [
                                            'label' => 'Data Pesanan',
                                            'url' => ['pesanan/index'],
                                            'badge' => $aktif + $menunggu + $nonaktif
                                        ],
                                        [
                                            'label' => 'Pesanan Aktif',
                                            'url' => ['pesanan/aktif'],
                                            'badge' => $aktif,
                                            'badgeOptions' => ['class' => 'label-success']
                                        ],
                                        [
                                            'label' => 'Pesanan Menunggu',
                                            'url' => ['pesanan/menunggu'],
                                            'badge' => $menunggu,
                                            'badgeOptions' => ['class' => 'label-warning']
                                        ],
                                        [
                                            'label' => 'Pesanan Non-Aktif',
                                            'url' => ['pesanan/nonaktif'],
                                            'badge' => $nonaktif,
                                            'badgeOptions' => ['class' => 'label-danger']
                                        ],
                                    ]
                                ],
                                ['label' => 'Bantuan', 'url' => ['user/bantuan'], 'icon' => 'question']                            
                            ]
                        ]) ?>
                    </div>
                </div>

                <div class="sidebar-footer hidden-small">
                    <?= Html::a(
                        '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>',
                        ['/'],
                        ['data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Home']
                    ) ?>
                    <?= Html::a(
                        '<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>',
                        ['user/ruangan'],
                        ['data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Data Ruangan']
                    ) ?>
                    <?= Html::a(
                        '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>',
                        ['user/profil'],
                        ['data-method' => 'post', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Profil']
                    ) ?>
                    <?= Html::a(
                        '<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>',
                        ['site/logout'],
                        ['data-method' => 'post', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Keluar']
                    ) ?>
                </div>
            </div>
        </div>
        
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?= Html::img($_foto, ['alt' => $_email]); ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                    <?= Html::a('<i class="fa fa-id-badge pull-right"></i> Profil', ['/user/profil']) ?>
                                </li>
                                <li><?= Html::a(
                                    '<i class="fa fa-sign-out pull-right"></i> Keluar',
                                    ['site/logout'],
                                    ['data-method' => 'post']
                                ) ?>
                                </li>
                            </ul>
                        </li>
                        <li>                            
                            <a><?= $_depan . ' ' . $_belakang ?></a>   
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="right_col" role="main">
            <?php
            Panel::begin(
                [
                    'header' => Html::encode($this->title),
                    'icon' => 'eercast'
                ]
            )
            ?>
            <?= \yiister\gentelella\widgets\FlashAlert::widget([
                'flashes' => [
                    'success' => [
                        'class' => 'success',
                        'header' => 'Berhasil !',
                        'icon' => 'check',
                    ],
                    'info' => [
                        'class' => 'info',
                        'header' => 'Info !',
                        'icon' => 'info-circle',
                    ],
                    'warning' => [
                        'class' => 'warning',
                        'header' => 'Peringatan !',
                        'icon' => 'warning',
                    ],
                    'error' => [
                        'class' => 'error',
                        'header' => 'Gagal !',
                        'icon' => 'ban',
                    ],
                ],
                'showHeader' => true
            ]); ?>            
            <?= $content ?>

            <?php Panel::end() ?>

            <div style="padding-top: 48px"></div>
        </div>

        <footer>
            <div class="pull-right">
                <?= 'Anda login sebagai ' . Html::a($_email) ?>
            </div>
            <div class="clearfix"></div>
        </footer>
    </div>
</div>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
<?php } ?>