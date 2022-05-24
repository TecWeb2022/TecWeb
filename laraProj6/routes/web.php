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


Route::get('/alloggioLoc/{id}', 'LocController@infoAcc')
        ->name('visualizzaAccLoc');

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

Route::view('/insertAcc', 'accommodation.insertAcc')
        ->name('insertAcc');

Route::post('/insertAcc', 'HostController@insertAcc')
        ->name('insertAccPost');

Route::get('/homeHost', 'HostController@index')
        ->name('homeHost');       

/* da vedere se 
Route::get('/catalogo/host', 'HostController@')
        ->name('catalogoHost');

Route::get('/alloggioHost/{id}', 'HostController@infoAcc')
        ->name('visualizzaAccHost');
*/

/*******ADMIN*******/


Route::get('/homeAdmin', 'AdminController@getFaqs')
        ->name('homeAdmin');

Route::get('/gestFaqs', 'AdminController@getFaqs2')
        ->name('gestFaqs');

Route::get('/nuovaFaq', 'AdminController@aggiungiFaq')
        ->name('nuovaFaq');
/*
Route::get('/modificaFaqs', '')
        ->name('modFaq');
 * 
 * Route::post('/modificaFaqs', '')
        ->name('modFaq');
*/
Route::get('/statistche', 'AdminController@stats')
        ->name('statistiche'); 