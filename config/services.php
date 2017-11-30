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
		'secret' => env('STRIPE_SECRET', 'sk_live_aAKqv9HrXvIcGATZo0bJUKC7'),
        'key' => env('STRIPE_KEY', 'pk_live_GZP0zDdPfMLjoMb5cV2Urqsw'),
	],

	'facebook' => [
		'client_id' => '192501274464058',
		'client_secret' => 'eb1985c490d7752e149541ae4cbf0cd6',
		'redirect' => 'http://careparrot.com/auth/login/callback/facebook'
	],

	'google' => [
		'client_id' => '1065149978335-nnk9a396dk56vd1ae6nuqqsh1ns7hm8l.apps.googleusercontent.com',
		'client_secret' => 'INI1IOK2tl-u1nWO3Rn5IRsX',
		'redirect' => 'http://careparrot.com/auth/login/callback/google'
	],

	'sendgrid' => [
		'username' => env('SENDGRID_USERNAME', 'careparrot1'),
        'password' => env('SENDGRID_PASSWORD', 'Parrotcare1'),
		'api_key' => env('SENDGRID_API_KEY', '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'),
		'ssl' => env('SENDGRID_SSL', false),
	],

	'pusher' => [
		'app_id' => env('PUSHER_ID','254291'),
		'app_key' => env('PUSHER_KEY','9247c7abbaff7cfe69db'),
		'app_secret' => env('PUSHER_SECRET','2d32db92370bfe186554'),
		'cluster' => 'mt1',
	],

    'hashid' => [
        'salt' => env('HASH_SALT','c@r3p@rR0t'),
    ],

];
