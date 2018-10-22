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
    'modules' => [
        'admin' => [//https://github.com/mdmsoft/yii2-admin
            'class' => \backend\modules\admin\Module::class,
            //'layout' => 'left-menu',
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'adminUser' => [
            'class' => \yii\web\User::class,
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'identityClass' => \mdm\admin\models\User::class,
            'loginUrl' => ['admin/rbac/user/login'],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
//            'identityClass' => \mdm\admin\models\User::class,
            //'loginUrl' => ['admin/user/login'],
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'authManager' => [
            //'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'view' => [//设置AdminLTE渲染 https://github.com/dmstr/yii2-adminlte-asset
//            'theme' => [
//                'pathMap' => [
//                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/testing/app'
//                ],
//            ],
        ],
        'assetManager' => [
            'bundles' => [
//                'dmstr\web\AdminLteAsset' => [
//                    'skin' => 'skin-green',
//                ],
                  'yii\web\JqueryAsset' => [
                    'sourcePath' => null,   // 一定不要发布该资源
                    'js' => [
                        'http://dev.final.wodegame.com/sources/common/js/jquery.min.js',
                    ]
                  ],
            ],
        ],
        "urlManager" => [
            //用于表明urlManager是否启用URL美化功能，在Yii1.1中称为path格式URL，
            // Yii2.0中改称美化。
            // 默认不启用。但实际使用中，特别是产品环境，一般都会启用。
            "enablePrettyUrl" => true,
            // 是否启用严格解析，如启用严格解析，要求当前请求应至少匹配1个路由规则，
            // 否则认为是无效路由。
            // 这个选项仅在 enablePrettyUrl 启用后才有效。
            "enableStrictParsing" => false,
            // 是否在URL中显示入口脚本。是对美化功能的进一步补充。
            "showScriptName" => false,
            // 指定续接在URL后面的一个后缀，如 .html 之类的。仅在 enablePrettyUrl 启用时有效。
            "suffix" => "",
            "rules" => [
                "<controller:\w+>/<id:\d+>"=>"<controller>/view",
                "<controller:\w+>/<action:\w+>"=>"<controller>/<action>"
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
    'language'=>'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    /*
    'as access' => [
        'class' => \mdm\admin\components\AccessControl::class,
        'allowActions' => [
            'site/login', 'site/error','site/index',
            !YII_ENV_TEST ? 'debug/*' : '',
//            'site/*',
//            'admin/*',
//            'debug/*',
//            'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    */
];
