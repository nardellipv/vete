<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

//Vete ADMIN
Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/clientes', 'CustomerController@index')->name('customer.index');
    Route::get('/clientes/ver/{dni}', 'CustomerController@viewCustomer')->name('customer.view');
    Route::post('/clientes/eliminar/{id}', 'CustomerController@destroyCustomer')->name('customer.destroy');
    Route::get('/clientes/agregar', 'CustomerController@showAddCustomer')->name('showAdd.customer');
    Route::post('/clientes/nuevo-cliente', 'CustomerController@addCustomer')->name('add.customer');
    Route::get('/clientes/editar/{dni}', 'CustomerController@showEditCustomer')->name('showEdit.customer');
    Route::post('/clientes/actualizar/{id}', 'CustomerController@showUpdateCustomer')->name('showUpdate.customer');

    Route::post('/', 'HomeController@addCustomerPatient')->name('add.customerPatient');

    Route::get('/pacientes', 'PatientController@index')->name('patient.index');
    Route::get('/pacientes/ver/{slug}/{id}', 'PatientController@viewPatient')->name('patient.view');
    Route::post('/pacientes/eliminar/{id}', 'PatientController@destroyPatient')->name('patient.destroy');
    Route::get('/pacientes/agregar', 'PatientController@showAddPatient')->name('showAdd.patient');
    Route::post('/pacientes/nuevo-paciente', 'PatientController@addPatient')->name('add.patient');
    Route::get('/paciente/editar/{slug}/{id}', 'PatientController@showEditPatient')->name('showEdit.patient');
    Route::post('/paciente/actualizar/{id}', 'PatientController@showUpdatePatient')->name('showUpdate.patient');

    Route::get('/turnos', 'TurnController@index')->name('turn.index');
});
//-----------------------
