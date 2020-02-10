<?php


Route::
Route::post('update/deleteDevice', \App\Events\Actions\UpdateDevice::class);
Route::get('/Dlogout', \App\Dentist\Actions\LogoutUserAction::class);
Route::get('/dentistDashboard', \App\Dentist\Actions\GetAuthenticatedUserAction::class);

