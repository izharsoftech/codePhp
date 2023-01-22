<?php

$slug = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_SPECIAL_CHARS);

$uri = explode("?", $slug);

if (isset($uri[1])) {
    $slug = $uri[0];
}

$API = '/api';

preg_match("#^$API#", $slug, $match_uri);

if ($match_uri && $match_uri[0] == $API) {
    // include api routes file
    route('api.php', ['uri' => $slug]);
} else {
    // include web routes file
    route('web.php', ['uri' => $slug]);
}