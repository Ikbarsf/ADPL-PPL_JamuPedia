<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCourseController;

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


Route::get('/back-admin/course/list-course', [AdminCourseController::class, 'index']);
// Route::get('/back-admin/course/add-course', [AdminCourseController::class, 'add']);
Route::post('/back-admin/course/store-course', [AdminCourseController::class, 'store']);
Route::post('/back-admin/course/{id}/edit-course', [AdminCourseController::class, 'edit']);
Route::put('/back-admin/course/{id}/update-course', [AdminCourseController::class, 'update']);
Route::delete('/back-admin/course/{id}/destroy-course', [AdminCourseController::class, 'destroy']);

Route::get('/back-admin/course/add-course', [AdminCourseController::class, 'create']);
