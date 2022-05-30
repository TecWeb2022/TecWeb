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

Route::get('/messaggiRicevutiLocatario', 'LocController@getMessaggiRicevuti')
        ->name('messaggisticaLoc');

Route::get('/messaggioLocatario/{id_mess}', 'LocController@getMessaggioRicevuto')
        ->name('messaggioLoc');

Route::get('/messaggioLocatario/{id_mess}/rispondi', 'LocController@scriviMess')
        ->name('scritturaMessLoc');

Route::post('/messaggioLocatario/invia', 'LocController@inviaMess')
        ->name('inviaMessLoc');

Route::get('/messaggiInviatiLocatario', 'LocController@getMessaggiInviati')
        ->name('messaggiInvLoc');

Route::get('/messaggioInviatoLocatario/{id_mess}', 'LocController@getMessaggioInviato')
        ->name('messaggioInvLoc');

Route::get('/messaggioInviatoLocatario/{id_mess}/riscrivi', 'LocController@riscriviMess')
        ->name('riscritturaMessLoc');

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

Route::get('/alloggioHost/{id}', 'HostController@infoAcc')
        ->name('infoAccHost');

Route::get('/modificaHostAcc/{id}', 'HostController@getAccModifica')
        ->name('modificaHostAcc');

Route::post('/modificaHostAcc/{id}','HostController@modificaAcc')
        ->name('modificaHostAccPost');

Route::post('/eliminaAcc','HostController@eliminaAcc')
        ->name('eliminaAcc');

Route::get('/visualizzaOpzioni','HostController@getAllOptions')
        ->name('visualizzaTutteOpzioni');

Route::post('/visualizzaOpzioniAcc','HostController@getOptionsAcc')
        ->name('visualizzaOpzioniAcc');

Route::get('/gestioneAccomodations', 'HostController@getAccsHost')
        ->name('gestioneAcc');

Route::post('/accettaOfferta', 'HostController@accettaOfferta')
        ->name('accettaOfferta');

Route::post('/contratto', 'HostController@contratto')
        ->name('contratto');


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