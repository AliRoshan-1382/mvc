<?php

namespace App\core\Routing;
use \App\core\Request;

class Router{
  private $request;
  private $routes;
  private $current_route;
  
  public function __construct()
  {
    $this->request = new Request();
    $this->routes = Route::routes();
    $this->current_route = $this->findRoute($this->request)  ?? null;
  }

  public function findRoute(Request $request){
    echo $request->method() . " " . $request->uri();

    foreach ($this->routes as $route) {
        if (in_array($request->method(),$route['methods']) && $request->uri() == $route['uri']) {
          return $route;
        }
    }
    return null;
  }

  public function run(){
    
  }
}

?>