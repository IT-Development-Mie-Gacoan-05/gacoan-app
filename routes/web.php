<?php

use App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CeoController;
use App\Http\Controllers\HeadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth web
Route::get('login', [AuthController::class,'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('ProsesLogin', [AuthController::class, 'ProsesLogin'])->name('ProsesLogin');
Route::post('ProsesRegister', [AuthController::class, 'ProsesRegister'])->name('ProsesRegister');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['AuthLogin:ceo']], function () {
        Route::resource('ceo', CeoController::class);
    });
    Route::group(['middleware' => ['AuthLogin:head']], function () {
        Route::resource('head', HeadController::class);
    });
});