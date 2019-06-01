<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],
    'github' => [
        'client_id'     => '43a3d281345d72803ffc',
        'client_secret' => 'c776c7b64487b2481c9e98510963aef338621373',
        'redirect'      => env('APP_URL') . '/oauth/github/callback',
    ],
    'wechat' => [
        'client_id'     => 'wxe72f52234dff5914',
        'client_secret' => '8f86264ffa3c610e956889253cc00fc6',
        'redirect'      => env('APP_URL') . '/oauth/github/callback',
    ],
    'weibo' => [
        'client_id'     => '3405113331',
        'client_secret' => 'c7aafc5d2970fcd6c09a760ad942f81f',
        'redirect'      => env('APP_URL') . '/weibo/callback',
    ]

];
