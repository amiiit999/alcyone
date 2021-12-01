<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GoogleSocialiteController;


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

 
 
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('/auth/google-callback', [GoogleSocialiteController::class, 'handleCallback']);


Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        if (Auth::guard('web')->user()) {
            
            return redirect('product');
        }    
        else
        {
            return view('welcome');
        }
        
    });

Route::resource('/category', CategoryController::class);
Route::resource('/product', ProductController::class);
});
