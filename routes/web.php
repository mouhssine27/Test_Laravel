<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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







Route::redirect('/',URL::To('/login'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//parcelle //
Route::get('/indexParcelle', 'ParcelleController@index');
Route::post('/storeParcelles', 'ParcelleController@store')->name('storeParcelles');
Route::post('/updateParcelle/{id}', 'ParcelleController@update')->name('updateParcelle');
Route::post('/deleteParcelle/{id}', 'ParcelleController@destroy')->name('deleteParcelle');
//end Parcelle//

//proprietaire //
Route::get('/indexProprietaire', 'ProprietaireController@index')->name('indexProprietaire');
Route::post('/storeProprietaire', 'ProprietaireController@store')->name('storeProprietaire');
Route::post('/updateProprietaire/{id}', 'ProprietaireController@update')->name('updateProprietaire');
Route::post('/deleteProprietaire/{id}', 'ProprietaireController@destroy')->name('deleteProprietaire');
//endProprietaire //

//village //
Route::get('/indexVillages', 'VillageController@index')->name('indexVillages');
Route::post('/storeVillages', 'VillageController@store')->name('storeVillages');
Route::post('/updateVillages/{id}', 'VillageController@update')->name('updateVillages');
Route::post('/deleteVillage/{id}', 'VillageController@destroy')->name('deleteVillage');
//end village //

//agent //
Route::get('/indexAgents', 'AgentController@index')->name('indexAgents')->middleware('isAdmin');
Route::post('/storeAgent', 'AgentController@store')->name('storeAgent');
Route::post('/updateAgent/{id}', 'AgentController@update')->name('updateAgent');
Route::post('/deleteAgent/{id}', 'AgentController@destroy')->name('deleteAgent');
//end agent //

//filtrage //
Route::get('/filtreProprietaire', 'ProprietaireController@filtreProprietaire')->name('filtreProprietaire');
Route::get('/filtreParcelle', 'ParcelleController@filtreParcelle')->name('filtreParcelle');
Route::get('/filtreVillage', 'VillageController@filtreVillage')->name('filtreVillage');
Route::get('/filtreAgent', 'AgentController@filtreAgent')->name('filtreAgent');
//end filtrage //

//exports //
Route::get('/word-export/{id}', 'ParcelleController@wordExports')->name('wordExports');
//end exports //








