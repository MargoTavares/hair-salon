<?php

/* Menu Navigation */
Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view ('about');
});

Route::get('/contact', function () {
    return view ('contact');
});

Route::get('/gallery', function () {
    return view ('gallery');
});

Route::get('/services', function () {
    return view ('services');
});
/* End Menu Navigation */

/* Controller Navigation */
Route::resource('appointments', 'AppointmentController');

/* Ask Rob */
Route::get('/appointments1', function () {
    return view ('appointments1');
});