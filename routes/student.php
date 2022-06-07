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

        'middleware' => [ 'auth:student']
    ], function () {

    //==============================dashboard============================
    Route::get('/student/dashboard', function () {
        $data['rap1'] = \App\Models\Rapport::count();
        $data['rap2'] = \App\Models\RapportPfe::count();
        $data['rap3'] = \App\Models\RapportStage::count();
        return view('Pages.Students.dashboard',$data);
    })->name('student.dashboard');

});
