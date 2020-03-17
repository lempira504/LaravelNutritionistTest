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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', 'HomeController@index');

Route::view('/', 'home');



// Route::get('citas', function()
// {
//     $customers = ['Pedro', 'Celestina', 'Otra Persona'];

//     return view('citas.index', compact('customers'));
// });

// Route::resource('/citas', 'CitasController');
// Route::get('citas/create', 'CitasController@create');




Auth::routes();
// Route::resource('/citas', 'CitasController');
// Route::resource('/plans', 'PlansController');
// Route::get('/entrevista/', 'PlansController@appointment')->name('entrevista.appointment');


// Newest One

// Route::resource('/horarios', 'ApptsController');//Lista
// Route::resource('/pacientes', 'PatientsController');
// Route::resource('/entrevista', 'InterviewsController');//Pendiente
// Route::resource('/plan-de-comida', 'FoodPlansController');//Pendiente
// 
// Route::resource('/informacion', 'OfficeInfosController');//Pendiente

//Ends Newest One

/*Latest One---------------------------------------*/
// Route::view('contacto', 'contact')->name('contactus.index');
Route::view('mensaje', 'message')->name('message.index');
Route::resource('contactos', 'ContactsController');
Route::view('quienes-somos', 'aboutus')->name('aboutus.index');
Route::resource('/horas', 'HoursController');
Route::resource('/porciones', 'PortionsController');
Route::resource('/citas', 'AppointmentsController');
Route::post('/citas/buscar', 'AppointmentsController@buscar')->name('citas.buscar');
Route::get('/entrevistas/crear/{id}', 'InterviewsController@interview')->name('entrevistas.interview');
Route::resource('/entrevistas', 'InterviewsController');
Route::resource('/planes', 'FoodPlansController');
Route::resource('/buscar', 'SearchHoursController');
Route::resource('/licencia', 'LicenseController');
Route::resource('/registro', 'RegistrationController');

/*End Latest One---------------------------------------*/

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index');
