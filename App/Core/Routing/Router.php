<?php

namespace App\core\Routing;
use \App\core\Request;

class Router{
  private $request;
  private $routes;
  private $current_route;
  const BASE_CONTROLLER = '\App\Controllers\\';
  public function __construct()
  {
    $this->request = new Request();
    $this->routes = Route::routes();
    $this->current_route = $this->findRoute($this->request)  ?? null;
  }

  public function findRoute(Request $request){
    // echo $request->method() . " " . $request->uri();

    foreach ($this->routes as $route) {
        if (in_array($request->method(),$route['methods']) && $request->uri() == $route['uri']) {
          return $route;
        }
    }
    return null;
  }

  public function dispatch404()
  {
    header("HTTP/1.0 404 Not Found");
    view('errors.404');
    die();
  }

  public function run(){
    // if($this->invalidRrquest($this->request)){
    //    $this->dispatch405();
    // }
    
    if (is_null($this-> current_route)) 
      $this->dispatch404();
    $this->dispatch($this-> current_route);
     
  }

  private function dispatch($route){
    $action = $route['action'];
    if (is_null($action) || empty($action)) {
        return;
    }

    if (is_callable($action)) {
        $action();
        // call_user_func($action);
    }

    if (is_string($action)) {
        $action = explode('@' , $action);
    }

    if (is_array($action)) {
      $class_name = SELF::BASE_CONTROLLER.$action[0];
      $method = $action[1];
      if (!class_exists($class_name)) {
        throw new \Exception("Class $class_name Not Exists!");
      }

      $controller = new $class_name();

      if (!method_exists($controller,$method)) {
        throw new \Exception("Method $method Not Exists in class $class_name");
      }
      $controller->{$method}();
    }
  }
}

?>