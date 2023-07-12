<?php 
use App\core\Routing\Route;
use App\Middleware\BlockFirefox;
use App\Middleware\BlockIE;
use App\Middleware\BlockChrome;


Route::get($_ENV['SampleRoute'].'/','HomeController@index');



Route::get($_ENV['SampleRoute'] . '/post/{slug}', 'PostController@single');
Route::get($_ENV['SampleRoute'] . '/post/{slug}/comment/{cid}', 'PostController@comment');




Route::get($_ENV['SampleRoute'].'/todo/list','TodoController@list',[BlockFirefox::class , BlockIE::class, BlockChrome::class]);
Route::get($_ENV['SampleRoute'].'/todo/add','TodoController@add');
Route::get($_ENV['SampleRoute'].'/todo/remove','TodoController@remove');



Route::get($_ENV['SampleRoute'].'/archive','ArchiveController@index');
Route::get($_ENV['SampleRoute'].'/archive/articles','ArchiveController@articles');
Route::get($_ENV['SampleRoute'] . '/archive/products', 'ArchiveController@products');


Route::add(['get','post','put'] , $_ENV['SampleRoute'].'/a' , function(){
    echo "welcome";
});

Route::get($_ENV['SampleRoute'].'/b' , function(){
    view('archive.index');
});

Route::put($_ENV['SampleRoute'].'/c' , ['Controller','Method']);

Route::get($_ENV['SampleRoute'].'/d' , ['Controller@Method']);


   

