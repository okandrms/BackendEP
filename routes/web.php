<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JobApplicationController;


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


Route::get('', fn() => redirect()->route('jobs.index'));


Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');


Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');


Route::get('login', fn() => redirect()->route('auth.create'))->name('login');
Route::get('/auth/create', [AuthController::class, 'create'])->name('auth.create');
Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');


Route::get('/register', fn() => redirect()->route('auth.show'))->name('register');
Route::get('/auth/show', [RegisterController::class, 'show'])->name('auth.show');
Route::post('/auth/create', [RegisterController::class, 'create'])->name('auth.create');


Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

Route::middleware('auth')->group(function () {
    Route::get('job/{job}/application/create', [JobApplicationController::class, 'create'])->name('job.application.create');
    Route::post('job/{job}/application', [JobApplicationController::class, 'store'])->name('job.application.store');
    
});
