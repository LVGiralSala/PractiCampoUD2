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
    
    Route::group(['middleware' => 'admin'], function () {
        // Registration Routes...
        if ($options['register'] ?? true) {
            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
            Route::post('register', 'Auth\RegisterController@register');
        }

        Route::get('users','Users\UsersController@index')->name('users_index');
        Route::get('users/{id}','Users\UsersController@edit')->name('users_edit');
    });
        
});

// Route::group(['middleware' => ['auth','user']], function () {
    
//     // Admin Routes
//     Route::get('/home', function () {
//         return view('welcome');
//     });
    
// });

