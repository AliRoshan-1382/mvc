<?php  

namespace App\Controllers;


class PostController{
    public function single()
    {
      global $request;
      nice_dd($request->get_route_param('slug'));
      // nice_dd($_GET);
    } 
    
    public function comment()
    {
      global $request;
      nice_dd($request->get_route_param('slug'));
      // nice_dd($_GET);
    }
}

?>