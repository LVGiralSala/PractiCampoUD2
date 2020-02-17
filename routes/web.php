<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => 'auth'], function () {
    
    // Admin Routes
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::group(['middleware' => 'admin','decano','asistD'], function () {
        // Registration Routes...
        if ($options['register'] ?? true) {
            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
            Route::post('register', 'Auth\RegisterController@register');
            Route::post('register/dirCompleta', 'Auth\RegisterController@completarDireccion')->name('dirCompleta');
        }


        // Route::get('users','Users\UsersController@index')->name('users_index');
        Route::get('users/{id}','Users\UsersController@edit')->name('users_edit');
        Route::put('users/{id}','Users\UsersController@update')->name('users_update');

        Route::get('users/filtrar/{id}','Users\UsersController@filterUser')->name('users_filter');
        Route::get('users/activos','Users\UsersController@verActivo')->name('users_activos');       
        Route::get('users/inactivos','Users\UsersController@verInactivo')->name('users_inactivos');

        
    });

    Route::group(['middleware'=>'admin','docente'], function (){

        Route::get('proyecciones','Proyeccion\ProyeccionController@index')->name('proyeccion_index');
        Route::get('proyecciones/activas','Proyeccion\ProyeccionController@verActiva')->name('proyeccion_activa');
        Route::get('proyecciones/inactivas','Proyeccion\ProyeccionController@verInactiva')->name('proyeccion_inactiva');
    });
    
        
});

// Route::group(['middleware' => ['auth','user']], function () {
    
//     // Admin Routes
//     Route::get('/home', function () {
//         return view('welcome');
//     });
    
// });

