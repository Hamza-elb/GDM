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





    Route::get('/', function(){
        return View ('dashboard');
    });


//==============================dashboard============================
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');


    Route::group(['namespace'=>'Pfas'],function (){
        Route::resource('Pfa', 'PfaController');
        Route::get('/resume', 'PfaController@resumer')->name('resume');

    });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



