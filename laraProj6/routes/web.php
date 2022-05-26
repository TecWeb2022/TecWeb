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

/*           PUBBLICO           */
Route::get('/', 'PublicController@getFaqs')
        ->name('home');

Route::get('/catalogo', 'PublicController@getCatalogo')
        ->name('catalogo');

Route::get('/alloggio/{id}', 'PublicController@infoAcc')
        ->name('visualizzaAcc');


/*           LOCATARIO           */

Route::get('/homeLocatario', 'LocController@index')
        ->name('homeLoc');

Route::view('/profiloLocatario', 'profiloLocatario')
        ->name('profiloLoc');

Route::view('/profiloLocatario/modifica', 'modificaLocatario')
        ->name('profiloLocModifica');

Route::post('/profiloLocatario/modifica', 'LocController@modificaLoc')
        ->name('modificaLoc');

Route::get('/catalogo/filtri', 'LocController@getCatPag')
        ->name('catalogoLoc');

Route::post('/catalogo/filtri', 'LocController@filters');


Route::get('/alloggio/{id}/opzione', 'LocController@opzioneForm')
        ->name('opzioneAcc');

Route::post('/alloggio/{id}/opzione', 'LocController@invioOpzForm')
        ->name('opzioneAccPost');

/*          REGISTRAZIONE           */

Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

/* * * * * * *LOCATORE * * * * * * * * * * * */

Route::get('/homeHost', 'HostController@index')
        ->name('homeHost');

Route::view('/insertAcc', 'accommodation.insertAcc')
        ->name('insertAcc');

Route::post('/insertAcc', 'HostController@insertAcc')
        ->name('insertAccPost');

//modificaHostAcc da completare col nome della funzione
Route::get('/modificaHostAcc/{id}', 'HostController@getAlloggioModifica')
        ->name('modificaHostAcc');

Route::post('/modificaHostAcc','HostController@modificaAlloggio')
        ->name('modificaHostAccPost');

Route::get('/visualizzaOpzioni','HostController@')
        ->name('visualizzaOpzioneAcc');

Route::get('/gestioneAnnunci', 'HostController@getAlloggiHost')
        ->name('gestioneAnn');


/*******ADMIN*******/


Route::get('/homeAdmin', 'AdminController@getFaqs')
        ->name('homeAdmin');

Route::get('/gestFaqs', 'AdminController@getFaqs2')
        ->name('gestFaqs');

Route::post('/modificaFaq/{id}', 'AdminController@getPageWithFaq')
        ->name('modifyFaq');

Route::post('/modificaFaq', 'AdminController@modificaFaq')
        ->name('faqModificata');

Route::post('/eliminaFaq', 'AdminController@eliminaFaq')
        ->name('eliminaFaq');

Route::get('/nuovaFaq', 'AdminController@showNuovaFaq')
        ->name('nuovaFaq');

Route::post('/nuovaFaq', 'AdminController@nuovaFaq')
        ->name('inserimentoFaq');

Route::view('/statistiche', 'admin.statistiche')
        ->name('statistiche');

Route::post('/statisticheFiltrate', 'AdminController@stats')
        ->name('statisticheFiltrate'); 