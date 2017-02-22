<?php

use yii\helpers\Html;

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
$_title = 'Sistem Ruang';

if (!Yii::$app->user->isGuest) {
    $_email = Yii::$app->user->identity->email;
    $_depan = Yii::$app->user->identity->nama_depan;
    $_belakang = Yii::$app->user->identity->nama_belakang;
    $_foto = Yii::$app->user->identity->foto;
} else {    
    $_email = '';
    $_depan ='';
    $_belakang = '';
    $_foto = '';
}

if ($_foto == '') {
    $_foto = '@web/uploads/default.jpg';
}


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
                    <a href="<?= $_home ?>" class="site_title"><i class="fa fa-fort-awesome"></i> <span><?= $_title ?></span></a>
                </div>
                <div class="clearfix"></div>

                <?php if (!Yii::$app->user->isGuest) { ?>
                <div class="profile">
                    <div class="profile_pic"> 
                        
                        <?= Html::img($_foto, ['class' => 'img-circle profile_img', 'alt' => $_email, 'style' => 'height: 56.35px']); ?>

                    </div>
                    <div class="profile_info">
                        <span>Hai,</span>
                        <h2><?= $_depan ?></h2>
                    </div>
                </div>

                <br /> 
                <?php } ?>

                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">

                        
                        <?php
                            if (Yii::$app->user->isGuest) {
                                $menuItems[] = ["label" => "Home", "url" => ["site/index"], "icon" => "home"];
                                $menuItems[] = [
                                    'label' => 'List Ruangan',
                                    'url' => '#',
                                    'icon' => 'list',
                                    'items' => [
                                        [
                                            "label" => "Tampilkan Kalender",
                                            "url" => ["/site/kalender-ruangan"],
                                        ],
                                        [
                                            "label" => "Tampilkan Grid",
                                            "url" => ["/site/grid-ruangan"],
                                        ],
                                    ],
                                ];
                                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup'], 'icon' => 'user'];
                                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login'], 'icon' => 'sign-in'];
                            } else {
                                echo Html::tag('h3', '-------------------------------------');
                                $menuItems[] = ["label" => "Home", "url" => ["user/index"], "icon" => "home"];
                                $menuItems[] = ['label' => 'Pesan Ruangan', 'url' => ['/user/ruangan'], 'icon' => 'list'];
                                $menuItems[] = ['label' => 'Pesananku', 'url' => ['/user/pesanan'], 'icon' => 'flag'];                               
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

                    <?php if (!Yii::$app->user->isGuest) { ?>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                
                                <?= Html::img($_foto, ['alt' => $_email]); ?>

                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                    <?= Html::a('<i class="fa fa-id-card pull-right"></i> Profil', ['/user/profil']) ?>
                                </li>
                                <li><?= Html::a(
                                    '<i class="fa fa-sign-out pull-right"></i> Keluar',
                                    ['/site/logout'],
                                    ['data-method' => 'post']
                                ) ?>
                                </li>
                            </ul>
                        </li>

                        <li>                            
                            <a><?= $_depan . ' ' . $_belakang ?></a>   
                        </li>

                    </ul>

                    <?php } else { ?>

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li>                            
                            <?= Html::a('PESAN RUANGAN <i class="fa fa-check-square-o"></i>', ['user/ruangan']) ?>
                        </li>

                    </ul>

                    <?php } ?>

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

            <?= \yiister\gentelella\widgets\FlashAlert::widget([
                'showHeader' => true
            ]); ?>
            
            <?= $content ?>

            <div style="padding-top: 20px; background-color: #f7f7f7"></div>
        </div>


        <footer>
            <div class="pull-right">
                <?php if (!Yii::$app->user->isGuest) {
                    echo 'Anda login sebagai ' . Html::a($_email); 
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
<?php } ?>