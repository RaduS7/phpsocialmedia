<?php

//------- INIT SETTINGS

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//------- FUNCTIONS

function dd($value)
{
    echo "<pre>";

    var_dump($value);

    echo "</pre>";

    die();
}

function urlIs($value)
{
    return getPath($_SERVER['REQUEST_URI']) === $value;
}

function getPath($path)
{
    return substr($path, 12);
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require($routes[$uri]);
    } else {
        abortRequest();
    }
}

function abortRequest($code = 404)
{
    http_response_code($code);

    require("views/{$code}-view.php");

    die();
}

//------- GLOBALS

session_start();