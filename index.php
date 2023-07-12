<?php

use App\core\Routing\Route;
use App\core\Routing\Router;

include "bootstrap/init.php";

$router = new Router();
$router -> run();

// $route = '/post/{slug}';
// $pattern = "/^" . str_replace(['/','{','}'],['\/','(?<','>[-%\w]+)'],$route) . "$/";

// nice_dump($route);
// nice_dump($pattern);
// // $route_pattern = '/^\/post\/(?<slug>[-%\w]+)$/';

// $uri1 = '/post/what-is-php';
// $uri2 = '/post/what-is-ali';
// $uri3 = '/product/what';

// $result = preg_match($route_pattern , $uri1 , $matches);

// nice_dump($result);
// nice_dump($matches);
?>