<?php  

namespace App\core;

use App\Utilities\Url;

class StupidRouter{
    private $routers;
    public function __construct()
    {
        $_ENV['SamoleRoute'];
        $this->routers = [
            '/'.$_ENV['SamoleRoute'].'/hasan/red'=>'colors/red.php',
            '/'.$_ENV['SamoleRoute'].'/hasan/blue'=>'colors/blue.php',
            '/'.$_ENV['SamoleRoute'].'/hasan/green'=>'colors/green.php',
        ];
    }

    public function run()
    {
        $current_route = Url::current_route();
        foreach ($this->routers as $route => $view ) {
            if ($current_route == $route) {
                $this->includeAndDie(BASEPATH."views/$view");
            }
        }
        header("HTTP/1.0 404 Not Found");
        $this->includeAndDie(BASEPATH ."views/errors/404.php");
    }

    public function includeAndDie($viewPath)
    {
        include $viewPath;
        die();
    }
}
?>