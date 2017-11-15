<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=101.37.82.36;dbname=tmbs',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                
                'class' => 'yii\log\FileTarget',
                
                'levels' => ['warning', 'error', 'info'],
                
                'categories' => ['wxpay'],
                
                'logFile' => '@app/runtime/logs/wxpay/'.date('Y-m-d').'.log',
                
                'maxFileSize' => 1024 * 2,
                
                'maxLogFiles' => 20,
                'logVars' => [], //  为空  get post server session 数据不会记录到日志中
                ],
                [
                
                'class' => 'yii\log\FileTarget',
                
                'levels' => ['warning', 'error', 'info'],
                
                'categories' => ['shortMessage'],
                
                'logFile' => '@app/runtime/logs/shortMessage/'.date('Y-m-d').'.log',
                
                'maxFileSize' => 1024 * 2,
                
                'maxLogFiles' => 20,
                'logVars' => [], //  为空  get post server session 数据不会记录到日志中
                ],
                [
                
                'class' => 'yii\log\FileTarget',
                
                'levels' => ['warning', 'error', 'info'],
                
                'categories' => ['alipay'],
                
                'logFile' => '@app/runtime/logs/alipay/'.date('Y-m-d').'.log',
                
                'maxFileSize' => 1024 * 2,
                
                'maxLogFiles' => 20,
                'logVars' => [], //  为空  get post server session 数据不会记录到日志中
                ]
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                "pay/pay/pay-index/<orderSn:\d+>"                                   => "pay/pay/pay-index",
                "pay/pay/wxpay/<orderSn:\d+>"                                       => "pay/pay/wxpay",
                "pay/pay/alipay/<orderSn:\d+>"                                      => "pay/pay/alipay",
                "pay/pay/pay-show/<orderSn:\d+>"                                      => "pay/pay/pay-show",
//                 "<controller:\w+>/<action:\w+>/<id:\d+>"                         => "<controller>/<action>",
//                 "<controller:\w+>/<action:\w+>"                                  => "<controller>/<action>",
                
            ],
        ],
    ],
    'modules' => [
        'gii' => [
            'class'=>'yii\gii\Module',
        ],
        'api' => [
            'class' => 'frontend\modules\api\api',
        ],
        'pay' => [
            'class' => 'frontend\modules\pay\pay',
        ],
    ],
    'params' => $params,
];
