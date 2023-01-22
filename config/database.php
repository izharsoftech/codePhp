<?php

// Create a connection, once only.

$config = [
    'driver'    => env('DB_DRIVER', 'mysql'),
    'host'      => env('DB_HOST', 'localhost'),
    'database'  => env('DB_DATABASE', ''),
    'username'  => env('DB_USERNAME', ''),
    'password'  => env('DB_PASSWORD', ''),
    'charset'   => env('DB_CHARSET', 'utf8'), // Optional
    'collation' => env('DB_COLLATION', 'utf8_unicode_ci'), // Optional
    'options'   => [ // PDO constructor options, optional
        PDO::ATTR_TIMEOUT => 5,
        PDO::ATTR_EMULATE_PREPARES => false,
    ],
];

try {
    if(!class_exists('DB')){
        new \Pixie\Connection($config['driver'], $config, 'DB');
    }
}
catch(PDOException $e)
{
  die($e->getMessage());
}