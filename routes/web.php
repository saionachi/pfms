<?php

use App\Http\Controllers\CategoriesManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;
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

// Authentication
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Budget Plan
    Route::get('/budget-plan', [DashboardController::class, 'index']);

    // Manage Funds
    Route::get('/manage-funds', [DashboardController::class, 'index']);

    // Cash Flow
    Route::get('/cash-flow', [DashboardController::class, 'index']);

    // Management > Users
    Route::get('/management/users{any}', function () {
        return view('management.users.index');
    })->where('any', '.*');

    // Management > Categories
    Route::resource('/management/categories', CategoriesManagementController::class);
});
