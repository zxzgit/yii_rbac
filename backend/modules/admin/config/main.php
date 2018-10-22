<?php
Yii::$app->setHomeUrl('/admin');

return [
    'modules' => [
        'rbac' => [//https://github.com/mdmsoft/yii2-admin
            'class' => mdm\admin\Module::class,
//            'layout' => 'left-menu',
        ],
    ],
    
    'as access' => [
        'class'        => \mdm\admin\components\AccessControl::class,
        'user'         => 'adminUser',
        'allowActions' => [
            'site/login', 'site/error', 'default/index',
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
];