<?php 
use App\core\Routing\Route;

Route::get($_ENV['SampleRoute'].'/','HomeController@index');

Route::get($_ENV['SampleRoute'].'/archive','ArchiveController@index');

Route::add(['get','post','put'] , $_ENV['SampleRoute'].'/a' , function(){
    echo "welcome";
});

Route::get($_ENV['SampleRoute'].'/b' , function(){
    echo "save ok";
});

Route::put($_ENV['SampleRoute'].'/c' , ['Controller','Method']);

Route::get($_ENV['SampleRoute'].'/d' , ['Controller@Method']);



   

