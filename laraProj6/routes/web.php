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

/*          REGISTRAZIONE           */

Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

/*           PUBBLICO           */
Route::get('/', 'PublicController@getFaqs')
        ->name('home');

Route::get('/catalogo', 'PublicController@getCatalogo')
        ->name('catalogo');

Route::get('/alloggio/{id}', 'PublicController@infoAcc')
        ->name('visualizzaAcc');


/*           LOCATARIO           */

Route::post('/profilo/modifica', 'LocHostController@modificaProfilo')
        ->name('modificaProfiloPost');

Route::get('/catalogo/filtri', 'LocController@getCatPag')
        ->name('catalogoLoc');

Route::post('/catalogo/filtri', 'LocController@filters')
        ->name('catalogoLocPost');

Route::get('/alloggio/{id}/opzione', 'LocController@opzioneForm')
        ->name('opzioneAcc');

Route::post('/alloggio/{id}/opzione', 'LocController@invioOpzForm')
        ->name('opzioneAccPost');

/* * * * * * *LOCATORE * * * * * * * * * * * */

Route::view('/gestioneOfferte/inserimentoOfferta', 'accommodation.insertAcc')
        ->name('insertAcc');

Route::post('/gestioneOfferte/inserimentoOfferta', 'HostController@insertAcc')
        ->name('insertAccPost');

Route::get('/gestioneOfferte/modificaOfferta/{id}', 'HostController@getAccModifica')
        ->name('modificaHostAcc');

Route::post('/modificaOffertaAlloggio','HostController@modificaAcc')
        ->name('modificaHostAccPost');

Route::post('/eliminaOfferta','HostController@eliminaAcc')
        ->name('eliminaAcc');

Route::get('/visualizzaOpzioni','HostController@getAllOptions')
        ->name('visualizzaTutteOpzioni');

Route::post('/gestioneOfferte/visualizzaOpzioni','HostController@getOptionsAcc')
        ->name('visualizzaOpzioniAcc');

Route::get('/gestioneOfferte', 'HostController@getAccsHost')
        ->name('gestioneAcc');

Route::post('/accettaOfferta', 'HostController@accettaOfferta')
        ->name('accettaOfferta');

Route::post('/contratto', 'HostController@contratto')
        ->name('contratto');

/* LOCATARIO E LOCATORE*/

/* Profilo*/

Route::view('/profilo', 'profilo')
        ->name('profilo')
        ->middleware('can:isLocHost');

Route::view('/profilo/modifica', 'modificaProfilo')
        ->name('modificaProfilo')
        ->middleware('can:isLocHost');

/* - Messaggistica -*/

Route::view('/messaggistica', 'messaggisticaAjax')
        ->name('messaggisticaAjax');

Route::get('/messInviatiAjax', 'LocHostController@getMessaggiInviatiAjax')
        ->name('messInvAjax');

Route::get('/messRicevutiAjax', 'LocHostController@getMessaggiRicevutiAjax')
        ->name('messRicAjax');

Route::get('/messaggistica/leggi/{id}', 'LocHostController@getMessaggio')
        ->name('infoMessaggio');

Route::get('/messaggistica/leggi/{id}/rispondi', 'LocHostController@scriviMess')
        ->name('scritturaMess');

Route::post('/messaggistica/invia', 'LocHostController@inviaMess')
        ->name('inviaMess');

/*******ADMIN*******/

Route::get('/gestioneFaqs', 'AdminController@getFaqs')
        ->name('gestFaqs');

Route::get('/gestioneFaqs/modificaFaq/{id}', 'AdminController@getPageWithFaq')
        ->name('modifyFaq');

Route::post('/gestioneFaqs/modificaFaq/{id}', 'AdminController@modificaFaq')
        ->name('faqModificata');

Route::post('/eliminaFaq', 'AdminController@eliminaFaq')
        ->name('eliminaFaq');

Route::get('/gestioneFaqs/nuovaFaq', 'AdminController@showNuovaFaq')
        ->name('nuovaFaq');

Route::post('/gestioneFaqs/nuovaFaq', 'AdminController@nuovaFaq')
        ->name('inserimentoFaq');

Route::view('/statistiche', 'admin.statistiche')
        ->name('statistiche');

Route::post('/statistiche', 'AdminController@stats')
        ->name('statisticheFiltrate');