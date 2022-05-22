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


Route::get('/homeLocatario', 'LocController@index')
        ->name('homeLoc');

Route::view('/profiloLocatario', 'profiloLocatario')
        ->name('profiloLoc');

Route::post('/profiloLocatario/modifica', 'LocController@modificaLoc')
        ->name('modificaLoc');

Route::get('/catalogo/filtri', 'LocController@getCatPag')
        ->name('catalogoLoc');

Route::post('/catalogo/filtri', 'LocController@filters');

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

Route::get('/insertAcc', 'HostController@prova1')
        ->name('insertAcc');


/*******ADMIN*******/


/*Route::get('/homeAdmin', '')
        ->name('homeAd');

Route::get('/gestFaqs', '')
        ->name('gestFaq');

Route::get('/aggiungiFaqs', '')
        ->name('addFaq');

Route::get('/modificaFaqs', '')
        ->name('modFaq');

Route::get('/statistche', '')
        ->name('stats'); */