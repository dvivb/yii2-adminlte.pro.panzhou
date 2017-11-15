<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=101.37.82.36;dbname=tmbs',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
            'cookieValidationKey' => 'qAliG57U-T5Q7aGL2wbJZQS9wFE11d_O',
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                
                'class' => 'yii\log\FileTarget',
                
                'levels' => ['warning', 'error', 'info'],
                
                'categories' => ['callback'],
                
                'logFile' => '@app/runtime/logs/callback/'.date('Y-m-d').'.log',
                
                'maxFileSize' => 1024 * 2,
                
                'maxLogFiles' => 20,
                'logVars' => [], //  为空  get post server session 数据不会记录到日志中
                ]
            ],
        ],
    ],
    'params' => $params,
];
