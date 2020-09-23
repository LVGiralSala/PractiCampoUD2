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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['verify' => true]);
// Auth::routes();

// ------> Authentication Routes... <------
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('loginEst', 'EstudianteController@showLoginFormEst')->name('loginEst');
// Route::group(['middleware' => 'activo'], function () {

    Route::post('login', 'Auth\LoginController@login'); 

    Route::post('loginEst', 'EstudianteController@loginEst'); 
// });
Route::post('imp-doc-estudiantes/{id}/{cod_est}','EstudianteController@importDoc')->name('import_doc_estudiante.img');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// ------> Usuarios Activos <------
Route::group(['middleware' => 'auth'], function () {
    
    // Route::group(['middleware' => 'inactivo'], function () {
    //     Route::get('/', function () {
    //         return view('inactivo');
    //     });
    // });

    // Route::group(['middleware' => 'activo'], function () {
    
    // Auth::routes(['verified'=>true])->middleware('verified');
    Route::get('/home', 'HomeController@index')->name('home');
    
    // ------> Admin Routes <------
    Route::group(['middleware' => 'admin','decano','asistD'], function () {

        // ------> Registration Routes... <------
        if ($options['register'] ?? true) { 
            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
            Route::post('register', 'Auth\RegisterController@register');
            Route::post('register/addEspacio', 'Auth\RegisterController@addEspacio')->name('addEspacio');
        }

        // Route::resource('users','Users\UsersController');
        Route::get('users/{id}','Users\UsersController@edit')->name('users_edit');
        Route::put('users/{id}','Users\UsersController@update')->name('users_update');
        Route::get('users/filtrar/{id}','Users\UsersController@filterUser')->name('users_filter');
        // Route::get('users/activos','Users\UsersController@verActivo')->name('users_activos');       
        // Route::get('users/inactivos','Users\UsersController@verInactivo')->name('users_inactivos');

    });

    Route::group(['middleware'=>'otros'], function (){

        
        // ------> Excel Routes <------
        Route::get('exp-users-list-excel','Excel\ExcelController@exportExcel')->name('export_list_users.excel');
        Route::post('imp-users-list-excel','Excel\ExcelController@importExcel')->name('import_list_users.excel');

        Route::get('exp-proyecc-list-excel','Excel\ExcelController@exportProyeccionesExcel')->name('export_list_proyecc.excel');
        Route::post('imp-proyecc-list-excel','Excel\ExcelController@importProyeccionesExcel')->name('import_list_proyecc.excel');

        Route::post('imp-estud-list-excel','Excel\ExcelController@prueba')->name('import_list_estud.excel');

        // ------> PDF Routes <------
        Route::get('proyecciones_pdf-html','Pdf\PdfController@generateHtml')->name('proyeccion_preliminar.excel');
        // Route::get('proyecciones_pdf','Pdf\PdfController@exportPdf')->name('proyeccion_preliminar.pdf');
        Route::get('proyecciones_pdf/{id}','Pdf\PdfController@exportPdf')->name('proyeccion_preliminar.pdf');
        Route::get('solicitudes_pdf','Pdf\PdfController@exportSolicitudPdf')->name('solicitud.pdf');
        Route::get('solicitudes','Solicitud\SolicitudController@index')->name('solicitud_index');

        // ------> image Routes <------
        // Route::post('imp-proyecc-plan-conting','Proyeccion\ProyeccionController@importPlanConting')->name('import_plan_conting.img');
        Route::get('exp-proyecc-plan-conting','Proyeccion\ProyeccionController@exportPlanConting')->name('export_plan_conting.img');

        // ------> Proyecciones Routes <------
        // Route::get('proyecciones','Proyeccion\ProyeccionController@index')->name('proyeccion_index');
        Route::get('proyecciones/filtrar/{id}','Proyeccion\ProyeccionController@filterProyeccion')->name('proyeccion_filter');
        Route::get('proyecciones/create','Proyeccion\ProyeccionController@create')->name('proyeccion_create');
        Route::post('proyecciones','Proyeccion\ProyeccionController@store')->name('proyeccion_store');
        Route::get('proyecciones/{id}','Proyeccion\ProyeccionController@edit')->name('proyeccion_edit');
        Route::put('proyecciones/{id}','Proyeccion\ProyeccionController@update')->name('proyeccion_update');
        Route::delete('proyecciones','Proyeccion\ProyeccionController@destroy')->name('proyeccion_destroy');
        Route::put('proyeccsend','Proyeccion\ProyeccionController@sendProy')->name('proyeccion_send');
        Route::post('proyecc_electiva','Proyeccion\ProyeccionController@validar_electivas')->name('proyeccion_electiva');
        // Route::post('proyecc_extramural','Proyeccion\ProyeccionController@validar_extramurales')->name('proyeccion_extramural');
        // Route::get('proyecciones/activas','Proyeccion\ProyeccionController@verActiva')->name('proyeccion_activa');
        // Route::get('proyecciones/inactivas','Proyeccion\ProyeccionController@verInactiva')->name('proyeccion_inactiva');

        // ------> solicitudes Routes <------
        Route::get('solicitudes/filtrar/{id}','Solicitud\SolicitudController@filterSolicitud')->name('solicitud_filter');
        Route::get('solicitudes/sel_ruta/{ruta}','Solicitud\SolicitudController@selRutaSolicitud')->name('solicitud_sel_ruta');
        Route::get('solicitudes/rutas/{id}','Solicitud\SolicitudController@showRuta')->name('solicitud_rutas');
        // Route::get('solicitudes','Solicitud\SolicitudController@pre_solicitud')->name('solicitud_index');
        Route::get('solicitudes/create','Solicitud\SolicitudController@create')->name('solicitud_create');
        Route::get('solicitudes','Solicitud\SolicitudController@pre_solicitud')->name('pre_solicitud');
        Route::post('solicitudes','Solicitud\SolicitudController@store')->name('solicitud_store');
        Route::get('solicitudes/{id}/{tipoRuta}','Solicitud\SolicitudController@edit')->name('solicitud_edit');
        Route::put('solicitudes/{id}/{tipoRuta}','Solicitud\SolicitudController@update')->name('solicitud_update');
        Route::delete('solicitudes','Solicitud\SolicitudController@destroy')->name('solicitud_destroy');
        // Route::get('solicitudes/activas','Solicitud\SolicitudController@verActiva')->name('solicitud_activa');
        // Route::get('solicitudes/inactivas','Solicitud\SolicitudController@verInactiva')->name('solicitud_inactiva');

        // Search Routes...
        // Route::resource('buscar/espa_aca','Otros\EspacioAcademicoController');
        Route::post('buscar/espa_aca','Otros\EspacioAcademicoController@searchEspaAca')->name('espa_aca');

        // // ------> prueba consulta codigo Routes <------
        // Route::get('solicitudes','Solicitud\SolicitudController@index_codigo')->name('index_codigo');
        // Route::post('solicitudes','Solicitud\SolicitudController@consulta_codigo')->name('consulta_codigo');

        // ------> SEND EMAIL <------
        Route::post('mail/send', 'Notificacion\NotificacionController@send')->name('sendNot');

        Route::post('mail/apertura_proy', 'Notificacion\NotificacionController@apertura_proy')->name('apertura_proy');
        Route::post('mail/cierre_proy', 'Notificacion\NotificacionController@cierre_proy')->name('cierre_proy');
        Route::post('mail/apertura_solic', 'Notificacion\NotificacionController@apertura_solic')->name('apertura_solic');
        Route::post('mail/cierre_solic', 'Notificacion\NotificacionController@cierre_solic')->name('cierre_solic');
        Route::post('mail/creacion_proy/{id}', 'Notificacion\NotificacionController@creacion_proy')->name('creacion_proy');
        Route::post('mail/creacion_solic/{id}', 'Notificacion\NotificacionController@creacion_solic')->name('creacion_solic');
        Route::post('mail/aprob_coord_proy', 'Notificacion\NotificacionController@aprob_coord_proy')->name('aprob_coord_proy');
        Route::post('mail/aprob_coord_solic', 'Notificacion\NotificacionController@aprob_coord_solic')->name('aprob_coord_solic');
        Route::post('mail/aprob_ejec_solic', 'Notificacion\NotificacionController@aprob_ejec_solic')->name('aprob_ejec_solic');
        Route::post('mail/radic_avance_tesor_solic', 'Notificacion\NotificacionController@radic_avance_tesor_solic')->name('radic_avance_tesor_solic');
        Route::post('mail/info_solic_estudiantes', 'Notificacion\NotificacionController@info_solic_estudiantes')->name('info_solic_estudiantes');
        Route::post('mail/info_transp_vice', 'Notificacion\NotificacionController@info_transp_vice')->name('info_transp_vice');
        Route::post('mail/noti_transp_solic', 'Notificacion\NotificacionController@noti_transp_solic')->name('noti_transp_solic');
        Route::post('mail/pre_salida', 'Notificacion\NotificacionController@pre_salida')->name('pre_salida');
        Route::post('mail/pos_salida', 'Notificacion\NotificacionController@pos_salida')->name('pos_salida');
        // Route::get('/sendemail', function () {
            
        //     $data = array (
        //         'name' => "Trogloditas Exitoso",
        //     );
        //     Mail::send('emails.welcome', $data, function ($message) {
        //         $message->from('trogloditascolombia@gmail.com', 'John Doe');
        //         // $message->sender('john@johndoe.com', 'John Doe');
        //         $message->to('trogloditascolombia@gmail.com')->subject('test email PractiCampoUD');
        //         // $message->cc('john@johndoe.com', 'John Doe');
        //         // $message->bcc('john@johndoe.com', 'John Doe');
        //         // $message->replyTo('john@johndoe.com', 'John Doe');
        //         // $message->subject('Subject');
        //         // $message->priority(3);
        //         // $message->attach('pathToFile');
        //     });
        //     return "Email enviado con exito!";
        // })->name('enviar_correo');

        // Route::get('/pdf', function () {
        //     return view('prueba');
        // });
    });

// });

});

// Route::group(['middleware' => ['auth','user']], function () {
    
//     // Admin Routes
//     Route::get('/home', function () {
//         return view('welcome');
//     });
    
// });

