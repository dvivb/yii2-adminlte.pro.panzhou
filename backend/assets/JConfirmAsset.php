<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class JConfirmAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/jquery-confirm.min.css',
    ];
    public $js = [
        'js/jquery-confirm.min.js'
    ];
    public $depends = [
        'backend\assets\AppAsset'
    ];
}
