<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

//Route created for the home page
Route::get('/', [HomeController::class, "index"])->name('home');

//Route created for the student page
//Route::get('/student', [StudentController::class, "index"])->name('student');

//Route created for the student entry
Route::prefix('/student')->group(function () {
        Route::get('/', [StudentController::class, "index"])->name('student');
        Route::post('/create', [StudentController::class, "create"])->name('student.create');
        Route::get('/{student_id}/remove', [StudentController::class, 'remove'])->name('student.remove');
        Route::get('/{student_id}/active', [StudentController::class, 'active'])->name('student.active');
});

//Route created for banners
Route::prefix('/banner')->group(function () {
        Route::get('/', [BannerController::class, "index"])->name('banner');
        Route::post('/create', [BannerController::class, "create"])->name('banner.create');
        Route::get('/{banner_id}/remove', [BannerController::class, 'remove'])->name('banner.remove');
        Route::get('/{banner_id}/active', [BannerController::class, 'status'])->name('banner.status');
});