<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ActionLogController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function() {

});


//post
Route::resource('posts', PostController::class);
Route::post('post-search', [PostController::class, 'search']);

//category
Route::resource('categories', CategoryController::class);
Route::post('post-by-category', [CategoryController::class, 'postByCategory']);

//action log
Route::resource('action-log', ActionLogController::class);
// Route::post('actionLog', [ActionLogController::class, 'store']);
