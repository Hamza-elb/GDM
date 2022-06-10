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
        $data['rap1'] = \App\Models\Rapport::count();
        $data['rap2'] = \App\Models\RapportPfe::count();
        $data['rap3'] = \App\Models\RapportStage::count();
        $data['pfa']=null;

        return view('Pages.Students.dashboard',$data);
    })->name('student.dashboard');

    Route::resource('searchS', 'RechercheStudent');



    Route::group([
        'namespace' => 'Pfas'
    ],function (){
        Route::resource('Pfa', 'PfaController');
        // Route::get('/resume/{id}', 'PfaController@afficherOne')->name('resume');
        Route::get('Download/{titre}/{filename}','PfaController@DownloadFile')->name('Download');

        Route::get('pfas/export','PfaController@export');

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




});



