<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
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

Route::get('topic',[TopicController::class,'index']);

Route::group([
    'middleware' => 'api',
], function () {
    Route::post('topic/subscribe',[TopicController::class,'subscribe']);

    Route::group(['prefix' => 'auth'], function(){
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
        Route::put('update', [AuthController::class, 'update']);
        Route::put('password-update', [AuthController::class, 'passwordUpdate']);
        Route::get('subscriptions', [AuthController::class, 'subscriptions']);
    });


});
