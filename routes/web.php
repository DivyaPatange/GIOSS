<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\StandardController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\StudentProfileController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserAccountController;

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
    return view('admin.login');
})->name('front');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::resource('/academicYear', AcademicController::class);
    Route::resource('/standard', StandardController::class);
    Route::resource('/section', SectionController::class);
    Route::resource('/class', ClassController::class);
    Route::resource('/school-profile', SchoolProfileController::class);
    Route::resource('/student-profile', StudentProfileController::class);
    Route::get('/sibling/{id}', [StudentProfileController::class, 'siblingForm'])->name('siblingForm');
    Route::delete('/sibling/delete/{id}', [StudentProfileController::class, 'siblingDestroy'])->name('sibling.destroy');
    Route::post('/sibling/submit', [StudentProfileController::class, 'siblingSubmit'])->name('sibling.submit');
    Route::resource('/teacher', TeacherController::class);
    Route::resource('/userAccount', UserAccountController::class);
    Route::delete('/adminAccount/delete/{id}', [UserAccountController::class, 'adminAccountDelete'])->name('adminAccount.destroy');
    Route::delete('/accAccount/delete/{id}', [UserAccountController::class, 'accAccountDelete'])->name('accAccount.destroy');

});

