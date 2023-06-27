<?php 
use App\core\Routing\Route;

Route::get('/null');

Route::add(['get','post','put'] , $_ENV['SampleRoute'].'/a' , function(){
    echo "welcome";
});

Route::post('/b' , function(){
    echo "save ok";
});

Route::put('/c' , ['Controller','Method']);

Route::get('/d' , ['Controller@Method']);



   

