<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfilesController;
use App\Http\Controllers\Admin\AdminListController;
use App\Http\Controllers\Admin\TrendPostController;


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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.profile.index');
    })->name('dashboard');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function() {
    //Profile
    Route::resource('profiles', ProfilesController::class);

    //Admin List
    Route::resource('admin-list', AdminListController::class);

    //Category
    Route::resource('category', CategoryController::class);

    //Post
    Route::resource('post', PostController::class);

    //Trend Post
    Route::resource('trend-post', TrendPostController::class);
});


