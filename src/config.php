<?php

return [

    'components' => [
        'request' => [
            'class' => '\yii\web\Request',
            'csrfParam' => '_csrf-yak',
            'cookieValidationKey' => '62863F32BEF7A03CE133D60B071A5B72',
        ],
        'user' => [
            'class' => '\yii\web\User',
            'identityClass' => 'kordar\yak\models\admin\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '__ace_identity', 'httpOnly' => true],
            'idParam' => '__bookcase_admin',
            'loginUrl' => ['/yak/auth/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-frontend',
            'class' => 'yii\redis\Session',
            'redis' => [
                'hostname' => '47.103.44.244',
                'port' => 6379,
                'password' => '4e074eb077494618a9cf4e48a551a2d2',
                'database' => 7
            ]
        ],
        'i18n' => [
            'class' => '\yii\i18n\I18N',
            'translations' => [
                'yak*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@kordar/yak/messages',
                    // 'sourceLanguage' => 'en-US',
                    'fileMap' => [

                    ],
                ],
            ],
        ],
        'formatter' => [
            'class' => 'kordar\yak\libs\YakFormatter',
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => '{{%auth_item}}',
            'itemChildTable' => '{{%auth_item_child}}',
            'assignmentTable' => '{{%auth_assignment}}',
            'ruleTable' => '{{%auth_rule}}',
            'defaultRoles' => ['guest'],
        ],

        'errorHandler' => [
            'class' => '\yii\web\ErrorHandler',
            'errorAction' => 'yak/default/error',
        ],

        'response' => [
            'class' => '\yii\web\Response',
            'format' => 'html',
        ],
    ]
];