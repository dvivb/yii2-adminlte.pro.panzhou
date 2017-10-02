<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*.*.*.*', '127.0.0.1', '::1', '192.168.0.*', '101.37.82.36'] // 按需调整这里
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MJOivPt-8jEKhdfSd57Tzr_fBLE_gMle',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=47.92.129.194;dbname=pro_panzhou',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ],
];
