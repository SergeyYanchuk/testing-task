<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'ru',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'thousandSeparator' => ' ',
            'decimalSeparator' => ',',
            'nullDisplay' => '<span class="not-set">(Нет значения)</span>',
        ]
    ],
];
