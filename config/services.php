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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '2428166207408987',
        'client_secret' => '1c320d876ca822048abf2a2b7aaee9f0',
        'redirect' => 'http://localhost:8080/DATN/auth/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '1021682225877-8ple3bt83nbduglljeol3i22snsmqros.apps.googleusercontent.com',
        'client_secret' => 'yf4g96HVB7dv9gI7r4ZAwWor',
        'redirect' => 'http://localhost:8080/DATN/auth/login/google/callback',
    ],

    // 'twitter' => [
    //     'client_id' => '937383544811-b8oag6n1s8j9l4ju58vflpnt8nnmcb4u.apps.googleusercontent.com',
    //     'client_secret' => 'QvVAAdHz61RJbbuEfWUuzMjS',
    //     'redirect' => 'http://localhost:8080/DATN/auth/login/twitter/callback',
    // ],

];
