<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//         'css/site.css',
//         'css/style/index.css',
        'css/style/pay-index.css/elementUI.css',
    ];
    public $js = [
//         'js/jquery.hammer-full.min.js',
        'js/jquery.min.js',
//         'js/main.js',
//         'js/plugin.js',
        'js/pay-index.js/vue.js',
        'js/pay-index.js/axios.min.js',
        'js/pay-index.js/elementUI.js',
        
//         'js/pay-index.js/pay-index.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
