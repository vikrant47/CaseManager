<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Server driver
    |--------------------------------------------------------------------------
    |
    | Supported: "http", "websocket"
    |
    */

    'driver' => env('SWOOLE_DRIVER', 'http'),

    /*
    |--------------------------------------------------------------------------
    | Server host
    |--------------------------------------------------------------------------
    |
    | The ip address of the server.
    |
    */

    'host' => env('SWOOLE_HOST', '0.0.0.0'),

    /*
    |--------------------------------------------------------------------------
    | Server host
    |--------------------------------------------------------------------------
    |
    | The port of the server.
    |
    */

    'port' => env('SWOOLE_PORT', '8000'),

    /*
    |--------------------------------------------------------------------------
    | Server configurations
    |--------------------------------------------------------------------------
    |
    | @see https://www.swoole.co.uk/docs/modules/swoole-server/configuration
    |
    */

    'options' => [
        'pid_file' => env('SWOOLE_OPTIONS_PID_FILE', base_path('storage/logs/swoole.pid')),

        'log_file' => env('SWOOLE_OPTIONS_LOG_FILE', base_path('storage/logs/swoole.log')),

        'daemonize' => env('SWOOLE_OPTIONS_DAEMONIZE', 1),

        'worker_num' => env('SWOOLE_OPTIONS_WORKER_NUM', 5),

        // This value must be greater than 0 if use websocket or task.
        'task_worker_num' => env('SWOOLE_OPTIONS_TASK_WORKER_NUM', 0),
    ],

    /*
    |----------------------------------------------------------------------
    | Resets
    |----------------------------------------------------------------------
    |
    | This option controls the instances that need to be reset
    | after each request.
    |
    */

    'resets' => [
        'auth',
        'auth.driver',
    ],

    /*
    |--------------------------------------------------------------------------
    | WebSocket message parser class
    |--------------------------------------------------------------------------
    |
    | This class allows you to customize the message format of websocket.
    | And it must implement "HuangYi\Swoole\Contracts\ParserContract".
    |
    */

    'message_parser' => HuangYi\Swoole\WebSocket\JsonParser::class,

    /*
    |--------------------------------------------------------------------------
    | Redis
    |--------------------------------------------------------------------------
    |
    | Specify a redis connection to store websocket rooms and clients.
    |
    */

    'redis' => [
        'connection' => env('SWOOLE_REDIS_CONNECTION', 'default'),

        'prefix' => env('SWOOLE_REDIS_PREFIX', 'websocket'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Swoole tables
    |--------------------------------------------------------------------------
    |
    | Define swoole table structures:
    |
    | "name": Table name.
    | "columns": Table columns.
    |
    | Define a column:
    |     [column_name, column_type, column_length]
    | Supported column types:
    |     "int", "integer", "string", "varchar", "char", "float"
    |
    */

    'tables' => [
        // [
        //     'name' => 'users',
        //     'columns' => [
        //         ['id', 'int', 8],
        //         ['nickname', 'string', 255],
        //         ['score', 'float'],
        //     ],
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | File watcher configurations
    |--------------------------------------------------------------------------
    |
    | "directories": The directories should be watched.
    | "excluded_directories": The directories should not be watched.
    | "suffixes": The file suffix to be watched should be in this array.
    |
    */

    'watcher' => [
        'directories' => [
            base_path(),
        ],

        'excluded_directories' => [
            base_path('storage/'),
        ],

        'suffixes' => [
            '.php', '.env',
        ],
    ],
];

