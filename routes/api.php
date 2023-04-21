<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
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

// authentication
Route::post('/login', [UserController::class, 'login']);
Route::post('/openchat', [ChatController::class, 'openChat']);

// send mail
Route::get('/mailing', [MailController::class, 'mailing']);

// all protected routes
Route::middleware('auth:api')->group(function () {

    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    Route::get('/logout', [UserController::class, 'logout']);
});
