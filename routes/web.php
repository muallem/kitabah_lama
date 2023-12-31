<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'index'])->name('home');
    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('coba', [HomeController::class, 'coba']);
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/thesis', [App\Http\Controllers\ThesisController::class, 'index'])->name('thesis.index');
    Route::get('/admin_thesis', [App\Http\Controllers\ThesisController::class, 'admin_thesis'])->name('thesis.admin_thesis');
    Route::get('/discussion', [App\Http\Controllers\DiscussionController::class, 'index'])->name('thesis.discussion');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('get_session', [HomeController::class, 'get_session']);
