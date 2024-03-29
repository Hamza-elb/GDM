<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


    //Auth::routes();

Route::group(
    [

        'middleware' => [ 'auth' ],
    ], function () {

    //==============================dashboard============================


    Route::get('/dashboard','HomeController@dashboard')->name('dash');


});

Route::get('/admin','HomeController@admin');
Route::get('/','HomeController@index')->name('home');









Route::group(['namespace' => 'Auth'], function () {
//
//    Route::get('/admin','LoginController@loginAdmin')->middleware('guest');
//
  Route::post('/login','LoginController@login')->name('login');
    Route::get('/logout','LoginController@logout')->name('logout');
    Route::post('/reg','LoginController@register')->name('register');
//
//

});

Route::get('/register',function(){
    return view('auth.register');
});



Route::group(
    [

        'middleware' => [ 'auth' ],
    ], function () {
    Route::resource('search', 'RechercheController');


    Route::group([
        'namespace' => 'Pfas'
    ], function () {
        Route::resource('Pfa', 'PfaController');
        // Route::get('/resume/{id}', 'PfaController@afficherOne')->name('resume');
        Route::get('Download_file_pfa/{titre}/{filename}', 'PfaController@DownloadFile')->name('Download_file_pfa');

        Route::get('export', 'PfaController@export');

    });

    Route::group([
        'namespace' => 'Pfes'
    ], function () {
        Route::resource('Pfe', 'PfeController');
        // Route::get('/resume/{id}', 'PfeController@afficherOne')->name('resume');
        Route::get('Download_file_pfe/{titre}/{filename}', 'PfeController@DownloadFile')->name('Download_file_pfe');
        Route::get('pfes/export', 'PfeController@export');



    });
    Route::group([
        'namespace' => 'Stages'
    ], function () {
        Route::resource('Stage', 'StageController');
        //Route::get('/resume/{id}', 'StageController@afficherOne')->name('resume');
        Route::get('Download_file_stage/{titre}/{filename}', 'StageController@DownloadFile')->name('Download_file_stage');
        Route::get('stage/export', 'StageController@export');
    });


});








