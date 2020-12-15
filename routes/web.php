<?php

use Illuminate\Support\Facades\Route;

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


/*=============================
=            Rutas            =
=============================*/

Route::redirect('inicio','/');
Route::get('/', 'GeneralController@homeView');
Route::get('usuarios','GeneralController@usersView');
Route::get('clientes','GeneralController@clientsView');
Route::get('servicios','GeneralController@servicesView');
Route::get('suscripciones','GeneralController@subscriptionsView');
Route::get('correos','GeneralController@mailsView');
Route::get('imprimir/{id}','GeneralController@printContract');
// Route::get('carga/clientes', 'ClientController@ctrClientImport');
Route::get('carga/suscripciones', 'SubscriptionController@ctrSubscriptionImport');

/*=============================
=            Usuarios            =
=============================*/
Route::post('/', 'UserController@ctrUserLogin');
Route::post('ajax/usuarios/editar','UserController@ajaxUserEdit');
Route::post('ajax/usuarios/editarme','UserController@ajaxEditMe');
Route::post('ajax/usuarios/check','UserController@ajaxUserCheck');
Route::post('ajax/usuarios/borrar','UserController@ctrUserDelete');
Route::post('editarme','UserController@ctrEditMe');
Route::post('usuarios', 'UserController@ctrUserCreate');
Route::post('usuarios/editar', 'UserController@ctrUserEdit');
Route::post('ajax/datatable/usuarios','UserController@ajaxDatatableUsuarios');
Route::get('salir','UserController@ctrUserLogout');

/*====================================
=            Clientes            =
====================================*/
Route::post('ajax/clientes/editar','ClientController@ajaxClientEdit');
Route::post('ajax/clientes/borrar','ClientController@ctrClientDelete');
Route::post('clientes', 'ClientController@ctrClientCreate');
Route::post('clientes/editar', 'ClientController@ctrClientEdit');
Route::post('ajax/datatable/clientes','ClientController@ajaxDatatableClientes');

/*====================================
=            Servicios            =
====================================*/
Route::post('ajax/servicios/editar','ServiceController@ajaxServiceEdit');
Route::post('ajax/servicios/borrar','ServiceController@ctrServiceDelete');
Route::post('servicios', 'ServiceController@ctrServiceCreate');
Route::post('servicios/editar', 'ServiceController@ctrServiceEdit');
Route::post('ajax/datatable/servicios','ServiceController@ajaxDatatableServicios');

/*====================================
=           Suscripciones           =
====================================*/
Route::post('ajax/suscripciones/editar','SubscriptionController@ajaxSubscriptionEdit');
Route::post('ajax/suscripciones/borrar','SubscriptionController@ctrSubscriptionDelete');
Route::post('suscripciones', 'SubscriptionController@ctrSubscriptionCreate');
Route::post('suscripciones/editar', 'SubscriptionController@ctrSubscriptionEdit');
Route::post('ajax/datatable/suscripciones','SubscriptionController@ajaxDatatableSuscripciones');
Route::post('ajax/suscripciones/activar','SubscriptionController@ajaxSubscriptionActivation');

/*====================================
=           Correos           =
====================================*/
Route::post('ajax/correos/editar','MailController@ajaxMailEdit');
Route::post('ajax/correos/borrar','MailController@ctrMailDelete');
Route::post('correos', 'MailController@ctrMailCreate');
Route::post('correos/editar', 'MailController@ctrMailEdit');
Route::post('ajax/datatable/correos','MailController@ajaxDatatableCorreos');

/*====================================
=           Notas           =
====================================*/
Route::post('ajax/notas/editar','NoteController@ajaxNoteEdit');
Route::post('ajax/notas/borrar','NoteController@ctrNoteDelete');
Route::post('notas', 'NoteController@ctrNoteCreate');
Route::post('notas/editar', 'NoteController@ctrNoteEdit');
Route::post('ajax/datatable/notas','NoteController@ajaxDatatableNotas');

/*=============================
=            Redireccion           =
=============================*/

Route::get('/{any}', function ($any) {

return redirect('/');

})->where('any', '.*');