<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
//         'redactor' => [
//             'class' => 'yii\redactor\RedactorModule',
//             'imageAllowExtensions'=>['jpg','png','gif'],
//             'uploadDir' => '../../public/uploads',
//             'uploadUrl' => 'http://www.hil-design.com/yii2/public/uploads', // 图片服务器地址
//         ],
    ],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                 ''=> 'bi/default/index',
                ]
         ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MJOivPt-8jEKhdfSd57Tzr_fBLE_gMle',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],

        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
	'view' => [
		'theme' => [
			'pathMap' => [ 
				'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app' 
					],
			],
	],
    
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        'project' => [
            'class' => 'backend\modules\project\project',
        ],
    ],
    'params' => $params,
];
