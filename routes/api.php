<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/drivers/Search',[\App\Http\Controllers\Api\DriverController::class,'index']);
Route::post('/register',[\App\Http\Controllers\Api\Auth\AuthController::class,'register']);
Route::post('/login',[\App\Http\Controllers\Api\Auth\AuthController::class,'login']);
Route::post('/socialLogin',[\App\Http\Controllers\Api\Auth\AuthController::class,'socialLogin']);

Route::post('/verifyCode',[\App\Http\Controllers\Api\Auth\AuthController::class,'verifyCode']);
Route::get('/country',[\App\Http\Controllers\Api\General\GeneralController::class,'country']);
Route::get('/city',[\App\Http\Controllers\Api\General\GeneralController::class,'city']);
Route::get('/services',[\App\Http\Controllers\Api\General\GeneralController::class,'services']);
Route::post('/attachments',[\App\Http\Controllers\Api\General\GeneralController::class,'attachments']);


Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('support',[\App\Http\Controllers\Api\Support\SupportController::class,'store']);

    Route::post('/updateLatLong',[\App\Http\Controllers\Api\Auth\AuthController::class,'updateLatLong']);
    Route::post('/logout',[\App\Http\Controllers\Api\Auth\AuthController::class,'logout']);
    Route::group(['prefix'=>'profile'],function(){
        Route::get('/',[\App\Http\Controllers\Api\Auth\AuthController::class,'getProfile']);
        Route::post('/update',[\App\Http\Controllers\Api\Auth\AuthController::class,'updateProfile']);

    });
//    Route::get('/logout',[\App\Http\Controllers\Api\Auth\AuthController::class,'']);

    Route::group(['prefix'=>'drivers'],function(){
        Route::post('/store',[\App\Http\Controllers\Api\Driver\DriverController::class,'store']);
    });

    Route::group(['prefix'=>'request'],function() {
        Route::get('/', [\App\Http\Controllers\Api\Request\RequestController::class, 'index']);
        Route::post('/createRequest', [\App\Http\Controllers\Api\Request\RequestController::class, 'createRequest']);
        Route::post('/sendRequest', [\App\Http\Controllers\Api\Request\RequestController::class, 'sendRequest']);
        Route::post('/updateRequest', [\App\Http\Controllers\Api\Request\RequestController::class, 'updateRequest']);
        Route::post('/updateStatus', [\App\Http\Controllers\Api\Request\RequestController::class, 'updateStatus']);
        Route::group(['prefix' => 'user'], function () {
            Route::group(['prefix' => 'myRequest'], function () {

                Route::get('/', [\App\Http\Controllers\Api\Request\RequestController::class, 'myRequestUser']);

            });
        });


        Route::group(['prefix' => 'driver'], function () {
            Route::group(['prefix' => 'myRequest'], function () {
                Route::get('/', [\App\Http\Controllers\Api\Request\RequestController::class, 'myRequestDriver']);
            });
        });
            Route::group(['prefix' => 'reviews'], function () {
                Route::get('/', [\App\Http\Controllers\Api\Review\ReviewController::class, 'index']);
                Route::post('/store', [\App\Http\Controllers\Api\Review\ReviewController::class, 'store']);
        });


    });

    Route::group(['prefix'=>'chats'],function(){
        Route::get('/',[\App\Http\Controllers\Api\ChatController::class,'index']);
        Route::post('/store',[\App\Http\Controllers\Api\ChatController::class,'store']);
    });

    Route::get('notifications',[\App\Http\Controllers\Api\NotificationController::class,'index']);

//    Route::
});
