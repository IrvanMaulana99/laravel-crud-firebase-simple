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

    'firebase' => [
        'api_key' => 'AIzaSyBpF3V2Kkl-hoUE6doPgTRfGF-3IH6QWLg',
        'auth_domain' => 'crud-laravel-irvan.firebaseapp.com',
        'database_url' => 'https://crud-laravel-irvan-default-rtdb.asia-southeast1.firebasedatabase.app',
        'project_id' => 'crud-laravel-irvan',
        'storage_bucket' => 'crud-laravel-irvan.appspot.com',
        'messaging_sender_id' => '485703036898',
        'app_id' => '1:485703036898:web:77437610197e3d2754d3bb',
        'measurement_id' => 'G-2YKHCSG84G',
    ],

];
