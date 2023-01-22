<?php

# Api routes
switch ($uri) {
    case '/api':
        echo "Hello world";
        die;

    default :
        echo '404';
        die;
}