<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    // in your module configuration you can have 'gridviewKrajee' as another module
    'modules' => [
         'gridview' =>  [
             'class' => '\kartik\grid\Module',
         // your other grid module settings
        ],
        'gridviewKrajee' =>  [
             'class' => '\kartik\grid\Module',
         // your other grid module settings
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
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
            'authManager'=>[
                'class'=>'yii\rbac\DbManager',
                'defaultRoles'=>['guest'],
            ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

   /*     'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
   */

    ],
    'params' => $params,
];
