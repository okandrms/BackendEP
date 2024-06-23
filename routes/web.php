<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\MyJobController;
use App\Http\Controllers\ChartController;




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


Route::get('/applications/{application}/download', [JobApplicationController::class, 'downloadCv'])->name('applications.downloadCv');

Route::get('my-job-applications', [MyJobApplicationController::class, 'index'])->name('my_job_applications.index');
Route::delete('my-job-applications/{my_job_application}', [MyJobApplicationController::class, 'destroy'])->name('my_job_applications.destroy');

Route::get('employer/create', [EmployerController::class, 'create'])->name('employer.create');
Route::post('employer', [EmployerController::class, 'store'])->name('employer.store');
Route::post('/employer/store', [EmployerController::class, 'store'])->name('employer.store');

Route::middleware('employer')
        ->resource('my-jobs', MyJobController::class);
    
});



Route::get('password/reset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [AuthController::class, 'reset'])->name('password.update');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/jobs/{id}', [ChartController::class, 'show']);
Route::get('/get-jobs', [ChartController::class, 'getJobs']);




