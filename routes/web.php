<?php

# Web routes
switch ($uri) {
    case '/':
        $data = "Hello World";

        view('welcome.php', compact('data'));
        
        die;

    default :
        echo '404';
        die;
}