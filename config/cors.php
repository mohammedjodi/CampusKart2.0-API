<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 
                'sanctum/csrf-cookie',

                 // Fortify authentication
                'login',
                'logout',
                'register',

                // Password management
                'forgot-password',
                'reset-password',
                'user/password',
                'user/confirm-password',
                'user/confirmed-password-status',

                // Profile management
                'user/profile-information',

                // Two-factor authentication
                'two-factor-challenge',
                'user/two-factor-authentication',
                'user/confirmed-two-factor-authentication',
                'user/two-factor-qr-code',
                'user/two-factor-recovery-codes',
                'user/two-factor-secret-key',

                // Passkeys
                'passkeys/*',
                'user/passkeys/*',
                
                ],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://localhost:3000'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
