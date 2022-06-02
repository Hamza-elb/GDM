<?php

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

//Route::group([
//    'middleware' => ['guest']
//],function (){
//    Route::get('/', function(){
//        return View ('auth.login');
//    });
//
//});
Route::get('/','HomeController@index')->name('selection');

//==============================dashboard============================
Route::get('/dashboard','HomeController@dashboard')->name('dashboard');

Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');

    Route::post('/login','LoginController@login')->name('login');

    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');


});



      Route::resource('search', 'RechercheController');




            Route::group([
                'namespace' => 'Pfas'
            ],function (){
                Route::resource('Pfa', 'PfaController');
               // Route::get('/resume/{id}', 'PfaController@afficherOne')->name('resume');
                Route::get('Download/{titre}/{filename}','PfaController@DownloadFile')->name('Download');

            });

            Route::group([
                'namespace' => 'Pfes'
            ],function (){
                Route::resource('Pfe', 'PfeController');
               // Route::get('/resume/{id}', 'PfeController@afficherOne')->name('resume');
                Route::get('Download_file/{titre}/{filename}','PfeController@DownloadFile')->name('Download_file');
            });
        Route::group([
            'namespace' => 'Stages'
        ],function (){
            Route::resource('Stage', 'StageController');
             //Route::get('/resume/{id}', 'StageController@afficherOne')->name('resume');
            Route::get('Download_stage/{titre}/{filename}','StageController@DownloadFile')->name('Download_stage');
        });












