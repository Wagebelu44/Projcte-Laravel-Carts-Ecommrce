<?php

return [

    'guards' => [
        'cliants' => [
            'driver' => 'session',
            'provider' => 'cliants',
        ],
    ],

    'providers' => [
        'cliants' => [
            'driver' => 'eloquent',
            'model' => App\Models\Cliant::class,
        ],
    ],

    'passwords' => [
        'cliants' => [
            'provider' => 'cliants',
            'table' => 'password_reset_tokens',
            'expire' => 60,
        ],
    ],

];
