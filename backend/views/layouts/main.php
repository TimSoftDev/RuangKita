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

$asset = yiister\gentelella\assets\Asset::register($this);
$tema = frontend\assets\TemaAsset::register($this);

$aktif = Ruangan::find()
    ->where(['status' => 'Aktif'])
    ->count();

$menunggu = Ruangan::find()
    ->where(['status' => 'Menunggu Validasi'])
    ->count();

$nonaktif = Ruangan::find()
    ->where(['between', 'waktu_selesai', 0, date('Y-m-d H:i')])
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
    <link rel="shortcut icon" href="<?= Yii::$app->homeUrl . '/img/favicon.png' ?>">
</head>
<body class="nav-md">
<?php $this->beginBody(); ?>
<div class="container body fixed">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?= Yii::$app->homeUrl ?>" class="site_title"><i class="fa fa-fort-awesome"></i> <span>Admin Sistem Ruang</span></a>
                </div>
                <div class="clearfix"></div>
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">

                        <?= \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Dashboard", "url" => ["dashboard/index"], "icon" => "dashboard"],
                                    [
                                        "label" => "Pemesanan Ruang",
                                        "url" => "#",
                                        "icon" => "pencil",
                                        "items" => [
                                            [
                                                "label" => "Data Pesanan",
                                                "url" => ["data/index"],
                                                "badge" => $aktif + $menunggu
                                            ],
                                            [
                                                "label" => "Pesanan Aktif",
                                                "url" => ["data/aktif"],
                                                "badge" => $aktif,
                                                "badgeOptions" => ["class" => "label-success"]
                                            ],
                                            [
                                                "label" => "Pesanan Menunggu",
                                                "url" => ["data/menunggu"],
                                                "badge" => $menunggu,
                                                "badgeOptions" => ["class" => "label-warning"]
                                            ],
                                            [
                                                "label" => "Pesanan Kadaluarsa",
                                                "url" => ["data/nonaktif"],
                                                "badge" => $nonaktif,
                                                "badgeOptions" => ["class" => "label-danger"]
                                            ],
                                        ]
                                    ],
                                    [
                                        "label" => "Penambahan Data",
                                        "url" => "#",
                                        "icon" => "windows",
                                        "items" => [
                                            ["label" => "Ruangan", "url" => ["ruang/index"]],
                                            ["label" => "Sesi Waktu", "url" => ["sesi-waktu/index"]],
                                            ["label" => "Program Studi", "url" => ["prodi/index"]],
                                            ["label" => "Fakultas", "url" => ["fakultas/index"]],
                                        ]
                                    ],
                                ]
                            ]
                        )
                        ?>
                    </div>
                </div>

                <div class="sidebar-footer hidden-small">
                    <?= Html::a(
                        '<span class="fa fa-home" aria-hidden="true"></span>',
                        ['/'],
                        ['title' => 'Home']
                    ) ?>
                    <?= Html::a(
                        '<span class="fa fa-building" aria-hidden="true"></span>',
                        ['dashboard/ruangan'],
                        ['title' => 'Pemesanan Ruangan']
                    ) ?>
                    <?= Html::a(
                        '<span class="fa fa-user" aria-hidden="true"></span>',
                        ['data/index'],
                        ['title' => 'Data Pemesan']
                    ) ?>
                    <?= Html::a(
                        '<span class="fa fa-sign-out" aria-hidden="true"></span>',
                        ['site/logout'],
                        ['data-method' => 'post', 'title' => 'Keluar']
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
                        <li>
                        <?= Html::a(
                            'Keluar',
                            ['/site/logout'],
                            ['data-method' => 'post']
                        ) ?>
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
                <?= 'Anda login sebagai ' . Html::a(Yii::$app->user->identity->email) ?>
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