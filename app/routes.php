<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// Route::get('users', function()
// {
//     return 'Users!';
// });

//Route::get('users', 'UserController@getIndex');

///Route::get('user/{id}', 'UserController@showProfile');

// Route::get('users', function()
// {
//     return View::make('users');
// });


Route::get('/login', 'AuthController@login'); 
Route::post('/login', 'AuthController@do_login'); // vindo do formulario de login

Route::get('/logout', 'AuthController@logout');



Route::group(["prefix" => "admin"], function(){
    Route::get("/", "AdminController@index");
    //Route::get("/dashboard", "AdminController@index");
    //AdminRoute::named("agendas", "AgendasAdminController");
    //AdminRoute::named("destaques", "DestaquesAdminController");
    
});


//Route::get('users', 'UserController@showProfile');
//Route::get('users', function(){
//	$users = User::all();
//	return View::make('users')->with('users',$users);
//});