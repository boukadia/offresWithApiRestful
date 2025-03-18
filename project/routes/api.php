<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\offreController;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    ;

});

Route::post('/register', [AuthController::class,'register'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login');

Route::get('/getOffre',[offreController::class,'index'])->name('offres');
Route::post('/addOffre',[offreController::class,'create'])->name('create');
Route::post('{id}/postuler',[offreController::class,'postuler'])->name('postuler')->middleware('auth.api');
Route::put('/{offre}/updateOffre',[offreController::class,'update'])->name('update');
Route::delete('/{offre}/deleteOffre',[offreController::class,'destroy'])->name('delete');