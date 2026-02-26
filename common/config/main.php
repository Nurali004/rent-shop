<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'session' => [
            'class' => 'yii\web\Session',
        ],
        'request' => [

        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '511165293736-g36lks4r55lvqrihfmfeqg9807tn6c84.apps.googleusercontent.com',
                    'clientSecret' => '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',
                ],
            ],
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
];
