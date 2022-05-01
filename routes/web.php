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


Auth::routes();

Route::group([
    'middleware' => ['guest']
],function (){
    Route::get('/', function(){
        return View ('auth.login');
    });

});



    Route::group(
        [
            'middleware' => ['auth']
        ], function (){

      Route::get('/dashboard','HomeController@index')->name('dashboard');
      Route::resource('search', 'RechercheController');




            Route::group([
                'namespace' => 'Pfas'
            ],function (){
                Route::resource('Pfa', 'PfaController');
                Route::get('/resume/{id}', 'PfaController@afficherOne')->name('resume');

                //diri hadi f group
                // Route::resource('stage', 'StageController');
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
            //Route::get('Download_file/{titre}/{filename}','StageController@DownloadFile')->name('Download_file');
        });



    });








