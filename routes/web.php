<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//grupo de rutas para aplicar autorizacion de rutas
//el valor 'admin' se tiene que declarar en el archivo kernel.php
Route::middleware(['auth','admin'])->namespace('Admin')->group(function (){
    //rutas asociadas especialidad
    Route::get('/specialties', 'SpecialtyController@index');//ruta que lista todas las especialidades
    Route::get('/specialties/create', 'SpecialtyController@create'); //form registro
    Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');

    Route::post('/specialties', 'SpecialtyController@store'); //envio del form de registro mediante post
    Route::put('/specialties/{specialty}', 'SpecialtyController@update');
    Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy');
    //Doctors
    Route::resource('doctors', 'DoctorController');
    //Patients
    Route::resource('patients', 'PatientController');
});

Route::middleware(['auth','doctor'])->namespace('Doctor')->group(function (){
    //rutas asociadas especialidad
    Route::get('/schedule', 'ScheduleController@edit');
    Route::post('/schedule', 'ScheduleController@store'); 
    /*Route::get('/specialties/create', 'SpecialtyController@create'); 
    Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');

    Route::post('/specialties', 'SpecialtyController@store'); 
    Route::put('/specialties/{specialty}', 'SpecialtyController@update');
    Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy');
    //Doctors
    Route::resource('doctors', 'DoctorController');
    //Patients
    Route::resource('patients', 'PatientController');*/
});


