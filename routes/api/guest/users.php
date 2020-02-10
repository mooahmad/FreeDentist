<?php

// client Login System

Route::post('/registerClient',\App\Users\Actions\RegisterUserAction::class);
Route::post('/cLogin',\App\Users\Actions\LoginUserAction::class);
Route::post('/userLoginFTime/{user}', \App\Users\Actions\LoginFirstTimmeAction::class);
Route::post('/forgetpassword', \App\Users\Actions\ForgotUserPasswordAction::class);

// Dentist Login System
Route::post('/registerCreate',\App\Dentist\Actions\RegisterUserAction::class);
Route::post('/dLogin',\App\Dentist\Actions\LoginUserAction::class);
Route::post('/LoginFirstTime/{user}', \App\Dentist\Actions\LoginFirstTimmeAction::class);
Route::post('/Dforgetpassword', \App\Dentist\Actions\ForgotUserPasswordAction::class);


Route::get('/cities', \App\Cities\Actions\CityAction::class);
Route::get('/countries', \App\Nationality\Actions\NationalityAction::class);
Route::get('/hospitals', \App\Hospital\Actions\HospitalsAction::class);

//Events
Route::get('/details/{event}', \App\Events\Actions\EventDetailsAction::class);

//Reservation
Route::post('/searchReservation', \App\Dentist\Actions\SearchReservation::class);

