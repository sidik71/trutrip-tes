<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Trip\TripListController;
use App\Http\Controllers\Api\AuthController;

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



// Travel Planner
$router->group(['prefix' => 'v1'], function () use ($router) {
    Route::post('register',[AuthController::class,'register']);
    Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);


    Route::group(["middleware" => ["auth:api"]], function(){
        Route::post('refresh-token',[AuthController::class,'refreshToken']);
        Route::post('logout',[AuthController::class,'logout']);

        Route::get('trip-list',[TripListController::class,'index']);
        Route::post('trip-list-create',[TripListController::class,'store']);
        Route::get('trip-list-detail/{id}',[TripListController::class,'show']);
        Route::delete('trip-list-delete/{id}',[TripListController::class,'destroy']);
        Route::put('trip-list-update/{id}',[TripListController::class,'update']);
    });


});