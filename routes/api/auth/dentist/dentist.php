<?php

Route::post('dentist/update_device', \App\Events\Actions\UpdateDevice::class);
Route::get('/Dlogout', \App\Dentist\Actions\LogoutUserAction::class);
Route::get('/dentistDashboard', \App\Dentist\Actions\GetAuthenticatedUserAction::class);

Route::post('/hospitalUpdate', \App\Dentist\Actions\UpdateHospitalAction::class);

Route::get('/showcalander2', \App\Dentist\Actions\ShowCalendarAction::class);



Route::post('/add_calander', \App\Dentist\Actions\AddCalendarAction::class);

Route::get('/dUAReservation', \App\Events\Actions\UpcomingDentistReservationAction::class);


Route::get('/dUAReservation', \App\Events\Actions\UpcomingDentistReservationAction::class);
//Pending Reservation
Route::get('/dPReservation', \App\Events\Actions\UpcomingDentistReservationAction::class);
//previous Reservation
Route::get('/dPReservation', \App\Events\Actions\DentistPreviousReservationAction::class);


Route::get('/accepet/{event}', \App\Events\Actions\AcceptReservationAction::class);
Route::get('/Neglect/{event}', \App\Events\Actions\DentistNeglectAction::class);


Route::get('/approve/{event}', \App\Events\Actions\DentistAproveAction::class);
Route::post('/deleteCalander', \App\Dentist\Actions\DeleteCalendarAction::class);

