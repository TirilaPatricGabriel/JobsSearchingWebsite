<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobsController;
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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/get_token', [AuthController::class, 'get_token']);
Route::get('/get_categories', [JobsController::class, 'get_categories']);

Route::post('/filter_jobs', [JobsController::class, 'filter_jobs']);
Route::get('/jobs', [JobsController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/create_job', [JobsController::class, 'store']);
});
