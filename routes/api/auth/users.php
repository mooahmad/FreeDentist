<?php

//Patient

Route::get('/clogout', \App\Users\Actions\LogoutUserAction::class);
Route::get('/clientDashboard', \App\Users\Actions\GetAuthenticatedUserAction::class);
Route::post('/patient/update_device', \App\Events\Actions\DeleteDeviceAction::class);


Route::get('/followers', \App\Followers\Actions\GetFollowersAction::class);
Route::post('/registerFClient', \App\Followers\Actions\RegisterFollowerAction::class);


Route::post('/UReservation', \App\Events\Actions\UpcomingReservationAction::class);
Route::post('/prevReservation', \App\Events\Actions\PreviousReservationAction::class);

Route::post('/addReservation', \App\Events\Actions\AddReservation::class);

Route::get('/Uaccepet/{event}', \App\Events\Actions\UserAcceptAction::class);
Route::get('/UNeglect/{event}', \App\Events\Actions\UserAcceptAction::class);










