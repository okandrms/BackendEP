<?php

use App\Http\Controllers\JobController;
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

Route::get('', fn() => to_route('jobs.index'));

// Define the 'jobs.index' route
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

// Define the 'jobs.show' route for individual job detail
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
