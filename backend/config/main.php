<?php
use \yii\web\Request;
$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'baseUrl' => $baseUrl,
        ],
       /* 'user' => [
            'identityClass' => 'common\models\User',
            'identityClass' => 'dektrium\user\models\Admin',
            'enableAutoLogin' => true,
        ],*/
        'user' => [
            'identityCookie' => [
                'name' => '_backendIdentity',
                'path' => 'admin',
                'httpOnly' => true,
            ],
        ],
        'session' => [
            'name' => 'BACKENDSESSID',
            //'savePath' => sys_get_temp_dir(),
            'cookieParams' => [
                'httpOnly' => true,
                'path'     => '/',
            ],
        ],
      
        'student' => [
            //'identityClass' => 'common\models\User',
            'class' => 'backend\models\TblStudent',
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
        'urlManager' => [
            'showScriptName' => false, // Disable index.php
            'enablePrettyUrl' => true, // Disable r= routes
            'enableStrictParsing' => true,
            'rules' => array(
                '' => 'site/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:[-\w]+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:[-\w]+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:[-\w]+>' => '<module>/<controller>/<action>',
            ),
        ],
        'view' => [
         'theme' => [
             'pathMap' => [
                '@backend/views' => '@backend/themes/adminlte'
             ],
         ],
       ],
    ],
    'params' => $params,
    'modules' => [
        'user' => [
           
           'as backend' => 'dektrium\user\filters\BackendFilter',
           //'controllers' => ['profile', 'recovery', 'registration', 'settings'],
           'controllerMap' => [
                'Security' => 'backend\controllers\SecurityController'],
           'modelMap' => [
                'User' => 'backend\models\User'],
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
    //...
    ],
];
