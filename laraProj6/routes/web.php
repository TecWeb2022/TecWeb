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

Route::view('/profilo', 'profilo')
        ->name('profilo')
        ->middleware('can:isLocHost');

Route::view('/profilo/modifica', 'modificaProfilo')
        ->name('modificaProfilo')
        ->middleware('can:isLocHost');

Route::post('/profilo/modifica', 'LocHostController@modificaProfilo')
        ->name('modificaProfiloPost');

Route::get('/catalogo/filtri', 'LocController@getCatPag')
        ->name('catalogoLoc');

Route::post('/catalogo/filtri', 'LocController@filters');

Route::get('/alloggio/{id}/opzione', 'LocController@opzioneForm')
        ->name('opzioneAcc');

Route::post('/alloggio/{id}/opzione', 'LocController@invioOpzForm')
        ->name('opzioneAccPost');

Route::get('/messaggiRicevutiLocatario', 'LocController@getMessaggiRicevuti')
        ->name('messaggisticaLoc');

Route::post('/messaggioLocatario/leggi', 'LocController@getMessaggioRicevuto')
        ->name('messaggioLoc');

Route::post('/messaggioLocatario/leggi/rispondi', 'LocController@scriviMess')
        ->name('scritturaMessLoc');

Route::post('/messaggioLocatario/invia', 'LocController@inviaMess')
        ->name('inviaMessLoc');

Route::get('/messaggiInviatiLocatario', 'LocController@getMessaggiInviati')
        ->name('messaggiInvLoc');

Route::get('/messaggioInviatoLocatario/{id_mess}', 'LocController@getMessaggioInviato')
        ->name('messaggioInvLoc');

Route::get('/messaggioInviatoLocatario/{id_mess}/riscrivi', 'LocController@riscriviMess')
        ->name('riscritturaMessLoc');

Route::get('/messAjaxInviati', 'LocHostController@getMessaggiInviatiAjax')
        ->name('messAjax');

Route::get('/messAjaxRicevuti', 'LocHostController@getMessaggiRicevutiAjax')
        ->name('messAjaxx');

Route::view('/messAjaxxxxx', 'messaggisticaAjax')
        ->name('messAjaxxx');

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

Route::view('/gestioneOfferte/inserimentoOfferta', 'accommodation.insertAcc')
        ->name('insertAcc');

Route::post('/gestioneOfferte/inserimentoOfferta', 'HostController@insertAcc')
        ->name('insertAccPost');

Route::post('/gestioneOfferte/modificaOfferta', 'HostController@getAccModifica')
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