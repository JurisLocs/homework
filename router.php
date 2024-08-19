<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/SOK/' => 'controllers/index.php', 
    '/SOK/registration' => 'controllers/registration.php', 
    '/SOK/sections' => 'controllers/sections.php', 
    '/SOK/delete' => 'controllers/delete.php', 
    '/SOK/edit' => 'controllers/edit.php', 
];

function routeToController($uri, $routes){
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {    
        abort();
    }
}

function abort($code = 404) {

    http_response_code($code);

    require "views/{$code}.php";

    die();
}