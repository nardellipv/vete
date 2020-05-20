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

    Route::get('/ventas', 'SaleController@index')->name('sale.index');
    Route::get('/ventas/mes', 'SaleController@sellMonth')->name('sale.month');
    Route::get('/ventas/busqueda', 'SaleController@searchAdvance')->name('search.advance');
    Route::post('/ventas/busqueda/fecha/resultado', 'SaleController@searchResultDateAdvance')->name('searchResultDate.advance');
    Route::post('/ventas/busqueda/cliente/resultado', 'SaleController@searchResultCustomerAdvance')->name('searchResultCustomer.advance');
    Route::post('/ventas/busqueda/estado/resultado', 'SaleController@searchResultStatusAdvance')->name('searchResultStatus.advance');
    Route::get('/ventas/nueva', 'SaleController@newSale')->name('new.sale');
    Route::post('/ventas/nueva/venta', 'SaleController@addNewSale')->name('addNew.sale');

    Route::get('/stock', 'StockController@index')->name('stock.index');
    Route::get('/stock/ver/{slug}/{id}', 'StockController@viewStock')->name('stock.view');
    Route::post('/stock/eliminar/{id}', 'StockController@destroyStock')->name('stock.destroy');
    Route::get('/stock/agregar', 'StockController@showAddStock')->name('showAdd.stock');
    Route::post('/stock/nuevo-producto', 'StockController@addStock')->name('add.stock');
    Route::get('/stock/editar/{slug}/{id}', 'StockController@showEditStock')->name('showEdit.stock');
    Route::post('/stock/actualizar/{id}', 'StockController@showUpdateStock')->name('showUpdate.stock');

    Route::get('/tareas', 'TaskController@index')->name('task.index');
    Route::get('/tareas/mes', 'TaskController@taskMonth')->name('task.month');
    Route::get('/tareas/busqueda', 'TaskController@taskSearchAdvance')->name('taskSearch.advance');
    Route::post('/tareas/busqueda/fecha/resultado', 'TaskController@searchResultDateTaskAdvance')->name('searchResultDateTask.advance');
    Route::post('/tareas/busqueda/estado/resultado', 'TaskController@searchResultWordTaskAdvance')->name('searchResultWordTask.advance');
    Route::get('/tareas/nueva', 'TaskController@newTask')->name('new.task');
    Route::post('/tareas/nueva/tarea', 'TaskController@addNewTask')->name('addNew.task');
    Route::get('/tareas/check/{id}', 'TaskController@checkTask')->name('check.task');
    Route::get('/tareas/borrar-tarea/{id}', 'TaskController@deleteTask')->name('delete.task');
    Route::get('/tareas/cambiar-prioridad/{id}/{priority}', 'TaskController@changePriorityTask')->name('changePriority.task');

});
//-----------------------
