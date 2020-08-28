<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => "163630209922-94et9dadjtkp2s50i4p02558qpcte91n.apps.googleusercontent.com",
        'client_secret' => "qDfcuv3sZfFLEyZ4vOx6Acp0",
        'redirect' => "https://owlrs.com/login/google/callback"
    ],
    'facebook' => [
        'client_id' => "298710931222304",
        'client_secret' => "1ad542d2f24b7975541237173b74aaae",
        'redirect' => "https://owlrs.com/login/facebook/callback"
    ],

];
