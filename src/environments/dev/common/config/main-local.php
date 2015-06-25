<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=localhost;dbname=testing_task',
            'username' => 'testing_task_user',
            'password' => '123',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
    'bootstrap' => ['debug', 'gii'],
    'modules' => [
        'debug' =>
            ['class' => 'yii\debug\Module',
                'allowedIPs' => ['127.0.1.1']
            ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => [
                '127.0.1.1',
            ],
        ]
    ],
];

