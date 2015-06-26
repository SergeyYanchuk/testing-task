<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'initialSystemBalance' => 3000000,
    'accountsCount' => 12000,
    'maskMoneyOptions' => [
        'prefix' => 'руб. ',
        'suffix' => '',
        'affixesStay' => true,
        'thousands' => ' ',
        'decimal' => ',',
        'precision' => 2,
        'allowZero' => false,
        'allowNegative' => false,
    ]
];
