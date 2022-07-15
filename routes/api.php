<?php

use App\Http\Controllers\Api\UserManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Management > Users
Route::post('/management/users/change-pw', [UserManagementController::class, 'changePassword']);
Route::post('/management/users/change-status', [UserManagementController::class, 'changeStatus']);
Route::apiResource('/management/users', UserManagementController::class);