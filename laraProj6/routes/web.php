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

/*
Route::get('/catalogoLocatario', 'LocController@getCatPag')
        ->name('catalogoLoc');
*/

Route::post('/catalogoFiltrato', 'LocController@filters');

Route::get('/alloggio/{id}', function($id){
   return $id;
});

Route::get('/alloggio/{id}', 'PublicController@getAccById')
        ->name('visualizzaAcc');

/*REGISTRAZIONE*/

Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

/* * * * * * * * * * * * * * * * * * */

Route::view('/profilo', 'profilo')
        ->name('profilo');

Route::view('/modifica', 'modifica')
        ->name('modifica');