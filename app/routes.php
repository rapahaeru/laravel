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


Route::group(array('before' => 'auth'), function()
{  

    Route::group(["prefix" => "admin"], function(){

      
            Route::get("/", "PainelController@index");
            Route::get('/logout', 'AuthController@logout');
            Route::get("/painel", "PainelController@index");
            Route::get("/usuarios", "UserController@showUsers");
            Route::get("/usuario/novo", "UserController@newUser");
            Route::get("/usuario/remove/{id}", "UserController@remove")->where('id', '[0-9]+');
            Route::get("/usuario/edit/{id}", "UserController@editUser")->where('id', '[0-9]+');
            Route::post("/usuario/atualiza/{id}", "UserController@update")->where('id', '[0-9]+');
            Route::post("/usuario/verifica-email", "UserController@emailExist");
            

        	 Route::group(['before' => 'csrf'], function() {
        		Route::post("/usuario/novo", "UserController@insert");
        	 });    
            
            //Route::get("/dashboard", "AdminController@index");
            //AdminRoute::named("agendas", "AgendasAdminController");
            //AdminRoute::named("destaques", "DestaquesAdminController");
        
        
    });

});

//Route::get('users', 'UserController@showProfile');
//Route::get('users', function(){
//	$users = User::all();
//	return View::make('users')->with('users',$users);
//});