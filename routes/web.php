<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/form', [UserController::class, 'showForm'])->name('user.form');
Route::post('/submit', [UserController::class, 'submitForm'])->name('user.submit');
Route::get('/', function () {
    return view('welcome');
});
