<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminRole;

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

// Auth::routes();
Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');


// Route::middleware("auth")->group(function(){
//     Route::get('/', [VisitController::class,'dashboard']);
// });
Route::get('/', [VisitController::class,'dashboard']);
Route::get('/management/user', [UserController::class,'index']);
Route::get('/register', [UserController::class,'signup']);
Route::post('/register', [RegisterController::class,'create']);


Route::get('/management/patient', [PatientController::class,'index']);
Route::get('/management/patient/{patient}/edit', [PatientController::class,'edit']);
Route::post('/management/patient', [PatientController::class,'store']);
Route::put('/management/patient/{patient}', [PatientController::class,'update']);
Route::get('/management/patient/create', [PatientController::class,'create']);
Route::get('/management/station', [StationController::class,'index']);
Route::get('station/{station}/edit', [StationController::class,'edit']);
Route::get('/management/station/create', [StationController::class,'create']);
Route::post('/management/station/store', [StationController::class,'store']);
Route::put('/management/station/{station_id}', [StationController::class,'update']);
Route::get('/management/visit', [VisitController::class,'index']);
Route::get('/management/visit/create', [VisitController::class,'create']);
Route::post('/management/visit', [VisitController::class,'store']);
Route::get('/visit/{visit}/edit', [VisitController::class,'edit']);


// Route::prefix('management')->group(function () {
//     Route::resource('user', [UserController::class]);
//     Route::resource('station', [StationController::class]);
//     Route::resource('patient', [PatientController::class]);
//     Route::resource('visit', [VisitController::class]);
// });

Route::resource('visit', 'VRoute::middleware("auth")->group(function(){
    isitController')->only([
    'create', 'store', 'destroy'
]);

Route::get('queue/{sid}/{date?}', [VisitController::class,'show_queue']);
Route::get('visit/history/{id}', [VisitController::class,'history']);
Route::put('visit/checkout', [VisitController::class,'checkout']);
Route::delete('visit/delete/{id}', [VisitController::class,'destroy']);

