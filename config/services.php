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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],


/**
 * ---- payment Intrigation systems ---------
 */

// 'stripe' => [
//     'key' => env('pk_test_51RTeOhBMC6Mpq9IqZYwL9JAZHCWztqyXTcxPNovR4ggENaHGSkOGH1hvG5Os2MXnbMrCX8UT3b7vJSZPqyTGDHnk00WFJjdASU'),
//     'secret' => env('sk_test_51RTeOhBMC6Mpq9IqEEqCPRyVTvfDkwaGjuvRWkvLkR8w2cmGdU52aexOmGX5jDrND1fWzksWTMOtDFMvw5R3Ci2y00D2EDgIoM'),
// ],










];
