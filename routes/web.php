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

use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::group(['middleware' => 'activo'], function () {

    Route::post('login', 'Auth\LoginController@login'); 
// });

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

        // Excel Routes
        Route::get('exp-users-list-excel','Excel\ExcelController@exportExcel')->name('export_list_users.excel');
        Route::post('imp-users-list-excel','Excel\ExcelController@importExcel')->name('import_list_users.excel');

        
    });

    Route::group(['middleware'=>'otros'], function (){

        // PDF Routes
        Route::get('proyecciones_pdf-html','Pdf\PdfController@generateHtml')->name('proyeccion_preliminar.excel');
        Route::get('proyecciones_pdf','Pdf\PdfController@exportPdf')->name('proyeccion_preliminar.pdf');
        Route::get('proyecciones','Proyeccion\ProyeccionController@index')->name('proyeccion_index');
        Route::get('solicitudes_pdf','Pdf\PdfController@exportSolicitudPdf')->name('solicitud.pdf');
        Route::get('solicitudes','Solicitud\SolicitudController@index')->name('solicitud_index');

        // Route::get('proyecciones','Proyeccion\ProyeccionController@index')->name('proyeccion_index');
        Route::get('proyecciones/activas','Proyeccion\ProyeccionController@verActiva')->name('proyeccion_activa');
        Route::get('proyecciones/inactivas','Proyeccion\ProyeccionController@verInactiva')->name('proyeccion_inactiva');

        //SEND EMAIL

        Route::get('/sendemail', function () {
            
            $data = array (
                'name' => "Trogloditas Exitoso",
            );

            Mail::send('emails.welcome', $data, function ($message) {
                $message->from('trogloditascolombia@gmail.com', 'John Doe');
                // $message->sender('john@johndoe.com', 'John Doe');
                $message->to('trogloditascolombia@gmail.com')->subject('test email PractiCampoUD');
                // $message->cc('john@johndoe.com', 'John Doe');
                // $message->bcc('john@johndoe.com', 'John Doe');
                // $message->replyTo('john@johndoe.com', 'John Doe');
                // $message->subject('Subject');
                // $message->priority(3);
                // $message->attach('pathToFile');
            });

            return "Email enviado con exito!";
        })->name('enviar_correo');
    });
    

        
});

// Route::group(['middleware' => ['auth','user']], function () {
    
//     // Admin Routes
//     Route::get('/home', function () {
//         return view('welcome');
//     });
    
// });

