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

Route::view('/profiloLocatarioDamodificare', 'modificaLocatario')
        ->name('profiloLocdaModificare');

Route::post('/profiloLocatario/modifica', 'LocController@modificaLoc')
        ->name('modificaLoc');

Route::get('/catalogo/filtri', 'LocController@getCatPag')
        ->name('catalogoLoc');

Route::post('/catalogo/filtri', 'LocController@filters');

Route::get('/alloggio/{id}', function($id){
   return $id;
});

Route::get('/alloggio/{id}', 'PublicController@infoAcc')
        ->name('visualizzaAcc');

Route::get('/alloggioLoc/{id}', 'LocController@infoAcc')
        ->name('visualizzaAccLoc');

Route::get('/alloggio/{id}/opzione', 'LocController@opzioneForm')
        ->name('opzioneAcc');

Route::post('/alloggio/{id}/opzione', 'LocController@invioOpzForm')
        ->name('opzioneAccPost');

/*REGISTRAZIONE*/

Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

/* * * * * * *LOCATORE * * * * * * * * * * * */

Route::get('/insertAcc', 'HostController@prova1')
        ->name('insertAcc');

Route::post('/insertAcc', 'HostController@insertAcc')
        ->name('insertAccPost');

Route::get('/homeHost', 'HostController@index')
        ->name('homeHost');       


/*******ADMIN*******/


/*Route::get('/homeAdmin', 'PublicControllerget@Faqs')
        ->name('homeAd');

Route::get('/gestFaqs', 'PublicControllerget@Faqs')
        ->name('gestFaq');

Route::get('/aggiungiFaqs', 'PublicControllerget@Faqs')
        ->name('addFaq');

Route::get('/modificaFaqs', '')
        ->name('modFaq');
 * 
 * Route::post('/modificaFaqs', '')
        ->name('modFaq');

Route::get('/statistche', '')
        ->name('stats'); */