<?php

use App\Http\Controllers\MessageController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/send/{id}', [MessageController::class, 'send'])->name('message.send');
Route::post('/send/{id}', [MessageController::class, 'store'])->name('message.store');

Route::get('last-ten-visits-date', [App\Http\Controllers\HomeController::class, 'lastTenVisitsDate'])->name('last-ten-visits-date');
