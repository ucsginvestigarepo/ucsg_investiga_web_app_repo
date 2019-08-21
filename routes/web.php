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

//route::get('/','InicioController@index');
/*route::get('/', function(){
    return view('welcome');
});*/
//Route::get('/','InicioController@index');

/* Page Routes */

Route::get('/', function () {
    return view('pages/ucsg-investiga-home');
});

Route::get('home-page-investiga', function () {
    return view('pages/ucsg-investiga-home');
});

Route::get('acerca-page-investiga', function () {
    return view('pages/ucsg-investiga-acerca');
});

Route::get('dominios-page-investiga', function () {
    return view('pages/ucsg-investiga-dominios');
});

Route::get('quienes-somos-page-investiga', function () {
    return view('pages/ucsg-investiga-quienes-somos');
});

Route::get('contacto-page-investiga', function () {
    return view('pages/ucsg-investiga-contacto');
});

Route::post('pages/enviarComentarioToAdmin', 'EmailController@enviarComentarioToAdmin');


/* System Routes */

Route::get('estado','EstadoController@index');
Route::get('estado/crear','EstadoController@crear');
Route::post('estado/guardar','EstadoController@guardar');
Route::get('estado/editar/{id?}','EstadoController@editar');
Route::post('estado/actualizar','EstadoController@actualizar');
Route::get('estado/eliminar/{id?}','EstadoController@eliminar');

Route::get('dominio','DominioControler@index');
Route::get('dominio/crear','DominioControler@crear');
Route::post('dominio/guardar','DominioControler@guardar');
Route::get('dominio/editar/{id?}','DominioControler@editar');
Route::post('dominio/actualizar','DominioControler@actualizar');
Route::get('dominio/eliminar/{id?}','DominioControler@eliminar');
Route::get('dominio/cambiaestado/{id?}/{id2?}','DominioControler@cambiaestado');

Route::get('rol','RolController@index');
Route::get('rol/crear','RolController@crear');
Route::post('rol/guardar','RolController@guardar');
Route::get('rol/editar/{id?}','RolController@editar');
Route::post('rol/actualizar','RolController@actualizar');
Route::get('rol/eliminar/{id?}','RolController@eliminar');

Route::get('fases','FasesController@index');
Route::get('fases/crear','FasesController@crear');
Route::post('fases/guardar','FasesController@guardar');
Route::get('fases/editar/{id?}','FasesController@editar');
Route::post('fases/actualizar','FasesController@actualizar');
Route::get('fases/eliminar/{id?}','FasesController@eliminar');
Route::get('fases/cambiaestado/{id?}/{id2?}','FasesController@cambiaestado');

Route::get('publicacion','PublicacionController@index');
Route::get('publicacion/crear','PublicacionController@crear');
Route::post('publicacion/guardar','PublicacionController@guardar');
Route::get('publicacion/editar/{id?}','PublicacionController@editar');
Route::post('publicacion/actualizar','PublicacionController@actualizar');
Route::get('publicacion/eliminar/{id?}','PublicacionController@eliminar');
Route::get('publicacion/storage/{archivo}', function ($archivo) {
    $public_path = public_path();
    $url = $public_path.'/storage/'.$archivo;
        return response()->download($url);
});


//Route::get('/','AuthController@index');
//Route::post('auth/store','AuthController@store');
//Route::get('auth/logout','AuthController@logout');
//Route::get('auth/register','AuthController@register');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('system','Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('return', 'Auth\LoginController@return')->name('return');

Route::get('menu','MenuController@index')->name('menu');
Route::get('submenu','MenuController@submenu')->name('submenu');


Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::get('nuevo','inicioController@nuevo')->name('nuevo');
Route::post('r_nuevo','inicioController@registrar')->name('registrar');
Route::get('recuperarclave','inicioController@recuperarclave')->name('recuperarclave');

Route::get('enviar', ['as' => 'enviar', function () {
    $sujeto="Esto es una prueba de envio";
    $data = ['link' => $sujeto];
    
    \Mail::send('correo.mail', $data, function ($message) {
 
        $message->from('investiga@ucsg.edu.ec', 'UCSG-INVESTIGA');
 
        $message->to('user@ucsg.edu.ec')->subject('Notificación');
 
    });
 
    return "Se envío el email";
}]);


Route::get('usuarios', 'UsuarioController@index');
Route::get('usuarios/crear','UsuarioController@crear');
Route::post('usuarios/guardar','UsuarioController@guardar');
Route::get('usuarios/editar/{id?}','UsuarioController@editar');
Route::post('usuarios/actualizar','UsuarioController@actualizar');
Route::get('usuarios/cambiaestado/{id?}/{id2?}','UsuarioController@cambiaestado');
Route::get('usuarios/cambioclave','UsuarioController@cambioclave');
Route::post('usuarios/actualizarclave','UsuarioController@actualizarclave');
Route::get('usuarios/olvidoclave','UsuarioController@olvidoclave');
Route::post('usuarios/enviarClave', 'EmailController@enviarClave');


Route::get('asignaciones', 'AsignacionesController@index')->name('asignaciones');
Route::get('asignaciones/crear','AsignacionesController@crear');
Route::post('asignaciones/guardar','AsignacionesController@guardar');
//Route::get('usuarios/editar/{id?}','UsuarioController@editar');
//Route::post('usuarios/actualizar','UsuarioController@actualizar');
Route::get('asignaciones/cambiaestado/{id?}/{id2?}','AsignacionesController@cambiaestado');

Route::get('carreras/{id}','CarreraController@getCarrera');//Contiene una funcion que permite el filtrado desde fuera de la sesion por eso se lo maneja de forma separada
// Las demas funciones contienen el validador para controlar el inicio de sesion
Route::get('carrera','CarreraBladeController@index');
Route::get('carrera/crear','CarreraBladeController@crear');
Route::post('carrera/guardar','CarreraBladeController@guardar');
Route::get('carrera/editar/{id?}','CarreraBladeController@editar');
Route::post('carrera/actualizar','CarreraBladeController@actualizar');
Route::get('carrera/eliminar/{id?}','CarreraBladeController@eliminar');
Route::get('carrera/cambiaestado/{id?}/{id2?}','CarreraBladeController@cambiaestado');

Route::get('facultad','FacultadController@index');
Route::get('facultad/crear','FacultadController@crear');
Route::post('facultad/guardar','FacultadController@guardar');
Route::get('facultad/editar/{id?}','FacultadController@editar');
Route::post('facultad/actualizar','FacultadController@actualizar');
Route::get('facultad/eliminar/{id?}','FacultadController@eliminar');
Route::get('facultad/cambiaestado/{id?}/{id2?}','FacultadController@cambiaestado');


Route::get('calificacion', 'RevisionController@index');
Route::post('calificacion/guardar','RevisionController@guardar');
Route::get('calificacion/aplicanota/{id?}','RevisionController@aplicanota');

Route::get('gestion', 'GestionController@index');
Route::post('gestion/guardar','GestionController@guardar');
Route::get('gestion/aplicanota/{id?}','GestionController@aplicanota');
//Route::get('gestion/actualizaestado/{id?}','GestionController@actualizaestado');
Route::post('gestion/aplicanota/actualizaestado','GestionController@actualizaestado');

Route::get('enviarCorreo/{cedula}/{nombre}/{clave}/{correo}', 'EmailController@enviarCorreo')->name('enviarCorreo');
Route::get('enviarEstadoPropuesta/{id}/{flag}/{proceso}', 'EmailController@enviarEstadoPropuesta')->name('enviarEstadoPropuesta');
Route::get('enviarCertificado_Gestor_Revisor/{id}', 'EmailController@enviarCertificado_Gestor_Revisor')->name('enviarCertificado_Gestor_Revisor');
Route::get('enviarCertificado_Profesor/{id}', 'EmailController@enviarCertificado_Profesor')->name('enviarCertificado_Profesor');

Route::get('estadistica', 'EstadisticaController@index');
Route::get('estadistica/listadoprofesores', 'EstadisticaController@listadoprofesores');
Route::get('estadistica/listadotema', 'EstadisticaController@listadotema');
Route::get('estadistica/listadofacultades', 'EstadisticaController@listadoFacultades');
Route::get('estadistica/top10', 'EstadisticaController@top10');
Route::get('estadistica/rechazadovscalificados', 'EstadisticaController@rechazadovscalificados');
Route::get('estadistica/rechazadovscalificados', 'EstadisticaController@rechazadovscalificados');

Route::get('estadistica/comparativa_dominios_temas', 'EstadisticaController@comparativa_dominios_temas');
Route::get('estadistica/comparativa_facultades_temas', 'EstadisticaController@comparativa_facultades_temas');
Route::get('estadistica/comparativa_usuarios_rol', 'EstadisticaController@comparativa_usuarios_rol');
Route::get('estadistica/rechazadosvscalificados_comparativa', 'EstadisticaController@rechazadosvscalificados_comparativa');


// Route::get('estadistica/prueba', function () {
//     return view('estadistica.prueba');
// });

Route::get('estadistica/dashboard_comparativo', 'EstadisticaController@dashboard_comparativo');


Route::get('ranking', 'RankingController@index');
Route::get('ganadores', 'GanadoresController@index');

Route::get('certificado/gestoryrevisor', 'CertificadoController@index')->name('certificado/gestoryrevisor');
Route::get('certificado/gestoryrevisor/modelo/{id}', 'CertificadoController@modelo_gestor_revisor');

Route::get('certificado/profesor', 'CertificadoController@index')->name('certificado/profesor');
Route::get('certificado/profesor/modelo/{id}', 'CertificadoController@modelo_ganadores');

/*Limpiar Cache*/
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});