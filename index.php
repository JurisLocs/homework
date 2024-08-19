<?php
require 'functions.php';
require 'router.php';

session_start();
routeToController($uri, $routes);

