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

Route::get('/', 'PublicController@getFaqs')
        ->name('home');

Route::get('/catalogo', 'PublicController@getCatalogo')
        ->name('catalogo');

Route::view('/profilo', 'profilo')
        ->name('profilo');

Route::view('/modifica', 'modifica')
        ->name('modifica');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');
