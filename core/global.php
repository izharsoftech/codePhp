<?php

if (!function_exists('includeFile')) {
    function includeFile($path, $args = [])
    {
        try{
            extract($args);

            if (!file_exists(__DIR__ . '/../' . $path)) {
                throw new Exception("Failed to open stream: No such file or directory named {{$path}} exists. <br>");
            }
            return require __DIR__ . './../' . $path;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
}

if (!function_exists('route')) {
    function route($filename, $args = [])
    {
        includeFile('routes/' . $filename, $args);
    }
}

if (!function_exists('env')) {
    function env($key, $default = NULL)
    {
        $env = includeFile('environment.php');

        if (isset($env[$key])) {
            return $env[$key];
        } else {
            return $default;
        }
    }
}

if (!function_exists('config')) {
    function config($filename, $key = NULL)
    {
        $config = includeFile('config/'. $filename);

        if ($key) {
            return $config[$key];
        }
        return $config;
    }
}

if (!function_exists('controller')) {
    function controller($filename, $method = NULL)
    {
        try{
            $class = basename($filename, '.php');

            if (!file_exists(__DIR__ . '/../controller/' . $filename)) {
                throw new Exception("Failed to open stream: No such file or directory named {{$filename}} exists. <br>");
            }
            require __DIR__ . './../controller/' . $filename;
            
            if (class_exists($class)) {
                $obj = new $class();
                if (isset($method)) {
                    $obj->$method();
                }
            }
            return;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
}

if (!function_exists('view')) {
    function view($filename, $args = [])
    {
        includeFile('view/' . $filename, $args);
    }
}

if (!function_exists('auth')) {
    function auth()
    {
        includeFile('middleware/auth.php');
    }
}

if (!function_exists('url')) {
    function url($url = NULL)
    {
        $env = env('APP_URL');
        if ($url) {
            return $env . '/' . $url;
        } else {
            return $env;
        }
    }
}

if (!function_exists('validate_input')) {
    function validate_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}