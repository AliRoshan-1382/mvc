<?php  

namespace App\Controllers;


class TodoController{
    public function list()
    {
      $data = [
            'tasks'=>['First Task','Second Task','7th Task','Test Task','Another Task'],
            'title' => 'لیست تسک ها'
      ];

      view('todo.list' , $data);
    }
}

?>