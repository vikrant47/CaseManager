<?php

return [
    /*
    |--------------------------------------------------------------------------
    | HTTP server configurations.
    |--------------------------------------------------------------------------
    |
    | @see https://wiki.swoole.com/wiki/page/274.html
    |
    */
    'server' => [
        'host' => env('SWOOLE_HTTP_HOST', '0.0.0.0'),
        'port' => env('SWOOLE_HTTP_PORT', '8000'),
        'options' => [
            'document_root' => base_path(''),
            'enable_static_handler' => true,
            'pid_file' => env('SWOOLE_HTTP_PID_FILE', base_path('storage/logs/swoole_http.pid')),
            'log_file' => env('SWOOLE_HTTP_LOG_FILE', base_path('storage/logs/swoole_http.log')),
            'daemonize' => env('SWOOLE_HTTP_DAEMONIZE', 0),
        ],
    ],
    'providers' => [
        // App\Providers\AuthServiceProvider::class,
        // Illuminate\Pagination\PaginationServiceProvider::class,
        // October\Rain\Router\RoutingServiceProvider::class,
        /*October\Rain\Html\HtmlServiceProvider::class,
        October\Rain\Html\UrlServiceProvider::class,
        October\Rain\Network\NetworkServiceProvider::class,*/
        \Demo\Core\Services\SwooleServiceProvider::class,
    ]
];
