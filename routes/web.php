<?php

use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\RecordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\RedirectToLogin;

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

Route::get('/', function () {
    return view('welcome');
});

auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create-user', [UserController::class, 'create']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])
    ->name('logout')
    ->middleware(RedirectToLogin::class);

Route::prefix('staff')->middleware(['auth', 'staff'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('staff.dashboard.index');

    Route::resource('records', RecordController::class);
});

Route::prefix('student')->middleware(['auth', 'student'])->group(function () {
    Route::get('dashboard', [StudentController::class, 'index'])->name('student.dashboard.index');
});
