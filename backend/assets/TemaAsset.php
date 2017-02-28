<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class TemaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/scheduler.min.css',
        'css/kastem.css',
    ];
    public $js = [
        'js/scheduler.min.js',
    ];
}
