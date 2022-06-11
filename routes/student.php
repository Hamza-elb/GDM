<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [

        'middleware' => [ 'auth:student'],

    ], function () {

    //==============================dashboard============================
    Route::get('/student/dashboard', function () {

        $data['pfa']=null;

        return view('Pages.Students.dashboard',$data);
    })->name('student.dashboard');

    Route::resource('searchS', 'RechercheStudent');



    Route::group([
        'namespace' => 'Pfas'
    ],function (){
       // Route::resource('Pfa', 'PfaController');
        Route::get('/resumePfa/{id}', 'PfaController@show')->name('resume');
        Route::get('Download/{titre}/{filename}','PfaController@DownloadFile')->name('Download');

        Route::get('pfas/export','PfaController@export');

    });

    Route::group([
        'namespace' => 'Pfes'
    ],function (){
        //Route::resource('Pfe', 'PfeController');
        Route::get('/resumePfe/{id}', 'PfeController@show')->name('resume_pfe');
        Route::get('Download_file/{titre}/{filename}','PfeController@DownloadFile')->name('Download_file');
    });


    Route::group([
        'namespace' => 'Stages'
    ],function (){
        //Route::resource('Stage', 'StageController');
        Route::get('/resume/{id}', 'StageController@show')->name('resumeStage');
        Route::get('Download_stage/{titre}/{filename}','StageController@DownloadFile')->name('Download_stage');
    });




});



