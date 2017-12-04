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
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
		'model'  => \App\Models\User::class,
		'secret' => env('STRIPE_SECRET'),
        'key' => env('STRIPE_KEY'),
	],

	'facebook' => [
		'client_id' => env('FACEBOOK_ID'),
		'client_secret' => env('FACEBOOK_SECRET'),
		'redirect' => env('FACEBOOK_CALLBACK')
	],

	'google' => [
		'client_id' => env('GOOGLE_ID'),
		'client_secret' => env('GOOGLE_SECRET'),
		'redirect' => env('GOOGLE_CALLBACK')
	],

	'sendgrid' => [
		'username' => env('SENDGRID_USERNAME'),
        'password' => env('SENDGRID_PASSWORD'),
		'api_key' => env('SENDGRID_API_KEY'),
		'ssl' => env('SENDGRID_SSL'),
	],

	'pusher' => [
		'app_id' => env('PUSHER_ID'),
		'app_key' => env('PUSHER_KEY',
		'app_secret' => env('PUSHER_SECRET'),
		'cluster' => 'mt1',
	],

    'hashid' => [
        'salt' => env('HASH_SALT'),
    ],

];
