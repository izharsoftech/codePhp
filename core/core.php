<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__. '/global.php';

$environment = env('ENVIRONMENT');

if ($environment == 'production') {
    ini_set('display_errors', 0);
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,  Content-Type");

includeFile('vendor/autoload.php');

// start session
includeFile('core/session.php');

// database
includeFile('config/database.php');

// routes
includeFile('core/route.php');