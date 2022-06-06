<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\CarrosserieController;
use App\Http\Controllers\VoiteurneufController;
use App\Http\Controllers\VoiteuroccasionController;
use App\Http\Controllers\UserController;

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
Route::middleware('jwt.verify')->group(function(){Route::get('user',[UserController::class,'getAuthenticatedUser']);
    //Route::resource('voiteurocc', VoiteuroccasionController::class);
});
Route::get('user-profile', [UserController::class,'userProfile']);
Route::post('logout', [UserController::class,'logout']);
Route::post('refresh', [UserController::class, 'refresh']);
Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'authenticate']);

Route::middleware('api')->group(function(){Route::resource('voiteurocc', VoiteuroccasionController::class);});
Route::middleware('api')->group(function(){Route::resource('voiteurneuf', VoiteurneufController::class);});
Route::middleware('api')->group(function () {Route::resource('carrosserie', CarrosserieController::class);});
Route::middleware('api')->group(function(){Route::resource('marque', MarqueController::class);});

use App\Http\Controllers\AuthController; 
Route::group([ 
 'middleware' => 'api', 
 'prefix' => 'auth'
], function ($router) { 
 Route::post('/login', [AuthController::class, 'login']); 
 Route::post('/register', [AuthController::class, 'register']); 
 Route::post('/logout', [AuthController::class, 'logout']); 
 Route::post('/refresh', [AuthController::class, 'refresh']); 
 Route::get('/user-profile', [AuthController::class, 'userProfile']); 
}); 