<?php

use yii\helpers\Html;
use kartik\alert\AlertBlock;

$bundle = yiister\gentelella\assets\Asset::register($this);

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

                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?= Yii::$app->homeUrl ?>" class="site_title"><i class="fa fa-fort-awesome"></i> <span>Admin Sistem Ruang</span></a>
                </div>
                <div class="clearfix"></div>

                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">

                        
                        <?php
                            if (Yii::$app->user->isGuest) {
                                $menuItems[] = ["label" => "Home", "url" => ["site/index"], "icon" => "home"];
                                $menuItems[] = ['label' => 'Signup', 'url' => ['site/signup'], 'icon' => 'user'];
                                $menuItems[] = ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in'];
                            } else {
                                $menuItems[] = ['label' => 'Cek Ruangan', 'url' => ['ruangan/index'], 'icon' => 'list'];
                                $menuItems[] = [
                                    'label' => 'Pengaturan',
                                    'url' => '#',
                                    'icon' => 'gear',
                                    'items' => [
                                        [
                                            "label" => "Ruang",
                                            "url" => ["ruang/index"],
                                        ],
                                        [
                                            "label" => "Fakultas",
                                            "url" => ["fakultas/index"],
                                        ],
                                        [
                                            "label" => "Prodi",
                                            "url" => ["prodi/index"],
                                        ],
                                    ],
                                ];                            
                            }
                            echo \yiister\gentelella\widgets\Menu::widget([
                                'items' => $menuItems,
                            ]);
                        ?>
                    </div>

                </div>

                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" style="width: 100%; cursor: unset; font-size: 1em;">
                        <span><strong><?= date('l, d M Y H:i') ?></span>
                    </a>
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
                        <?php if (!Yii::$app->user->isGuest) {                            
                            echo Html::a(
                                'Keluar',
                                ['/site/logout'],
                                ['data-method' => 'post']
                            );
                        } else {
                            echo Html::a(
                                date('l, d M Y')
                            );
                        } ?>
                        </li>

                    </ul>

                </nav>
            </div>

        </div>

        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari..">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= AlertBlock::widget([
                'type' => AlertBlock::TYPE_ALERT,
                'useSessionFlash' => true
            ]); ?>
            
            <?= $content ?>

            <div style="padding-top: 20px; background-color: #f7f7f7"></div>
        </div>


        <footer>
            <div class="pull-right">
                <?php if (!Yii::$app->user->isGuest) {
                    echo 'Anda login sebagai ' . Html::a(Yii::$app->user->identity->email); 
                } else {
                    echo 'Aplikasi Sistem Peminjaman Ruang | Tim SoftDev ' . date('Y');
                }?>
            </div>
            <div class="clearfix"></div>
        </footer>
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
