<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\MitraECommersController;
use App\Http\Controllers\CustomerEnrollController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerListCourseController;
use App\Http\Controllers\CustomerTransaksiCourseController;

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

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function() {
        return view('pages/utility/404');
        // Route::controller(RoleController::class)->groub(function(){
        //     Route::get('/roles', 'index');
        // });
    });
});

Route::resource('roles', RoleController::class);

// Admin
Route::get('/back-admin/course/list-course', [AdminCourseController::class, 'index']);
Route::get('/back-admin/course/add-course', [AdminCourseController::class, 'add']);
Route::post('/back-admin/course/store-course', [AdminCourseController::class, 'store']);
Route::post('/back-admin/course/{id}/edit-course', [AdminCourseController::class, 'edit']);
Route::put('/back-admin/course/{id}/update-course', [AdminCourseController::class, 'update']);
Route::delete('/back-admin/course/{id}/destroy-course', [AdminCourseController::class, 'destroy']);
Route::get('/back-admin/course/detail-peserta/{id}', [AdminCourseController::class, 'cek_peserta']);

Route::get('/back-admin/user/list-customer', [AdminUserController::class, 'listCustomer']);
Route::get('/back-admin/user/list-mitra', [AdminUserController::class, 'listMitra']);



// Customer
// Route::get('/back-customer/dashboard', [CustomerDashboardController::class, 'index']);

Route::get('/back-customer/course/list-course', [CustomerListCourseController::class, 'index']);
Route::get('/back-customer/course/paid-course', [CustomerListCourseController::class, 'myCourse']);
Route::get('/back-customer/my-course/{slug}/persiapan-course', [CustomerListCourseController::class, 'myCourseDetail']);
Route::get('/back-customer/my-course/{slugCourse}/{slugModule}/{slugContent}', [CustomerListCourseController::class, 'myCourseDetails']);
Route::post('/back-customer/enroll/enroll-course/{id}', [CustomerEnrollController::class, 'store']);
Route::get('/back-customer/transaksi/transaksi-course', [CustomerTransaksiCourseController::class, 'index']);
Route::delete('/back-customer/my-course/{id}/destroy-course', [CustomerEnrollController::class, 'destroy']);





// Mitra
// Route::get('/back-mitra/dashboard', [MitraDashboardController::class, 'index']);
Route::get('/back-mitra/E-Commers/list-barang', [MitraECommersController::class, 'index']);
Route::get('/back-mitra/E-Commers/add-barang', [MitraECommersController::class, 'add']);
