<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/profile', 'profile');

    });
});
Route::get('users',[AuthController::class,'users']);

Route::post('signup',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);


Route::get('patients',[PatientController::class,'all']);
Route::controller(VisitController::class)->group(function(){
    Route::post('visit','storeV');
    Route::get('visit','all');
    Route::get('visits/{id}','histry');
});

Route::controller(PatientController::class)->group(function(){
    Route::get('patients','all');
    Route::post('patients','creat');
});

Route::controller(StationController::class)->group(function(){
    Route::get('stations','all');

});

