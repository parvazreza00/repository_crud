<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\WeatherAPIController;
use App\Http\Controllers\CategoryController;

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
    return view('welcome');
});


// paypal payment gatway integration
Route::get('/paypal', function () {
    return view('paypal');
});

Route::resource('categories', CategoryController::class);

Route::post('paypal/payment',[PaypalController::class, 'paypal'])->name('paypal');
Route::get('success/payment',[PaypalController::class, 'success'])->name('success.payment');
Route::get('cancel/payment',[PaypalController::class, 'cancel'])->name('cancel.payment');




Route::get('/posts', [App\Http\Controllers\TestController::class, 'index']);
Route::get('/posts/store', [App\Http\Controllers\TestController::class, 'store']);
Route::get('/posts/update', [App\Http\Controllers\TestController::class, 'update']);
Route::get('/posts/delete', [App\Http\Controllers\TestController::class, 'delete']);
Route::get('/posts/all', [App\Http\Controllers\TestController::class, 'allContorllerMehtod']);

Route::get('/my-form', [App\Http\Controllers\ProductController::class, 'ipv6form']);
Route::post('/submit-form', [App\Http\Controllers\ProductController::class, 'validateForm'])->name('validate.ip');

//product all route start
Route::get('/allproduct', [ProductController::class, 'product'])->name('product');
Route::post('/add/product', [ProductController::class, 'add_product'])->name('add.product');
Route::post('/update/product', [ProductController::class, 'update_product'])->name('update.product');
Route::get('/delete/product', [ProductController::class, 'delete_product'])->name('delete.product');
Route::get('/pagination/pagination-data', [ProductController::class, 'pagination']);
Route::get('/search-product', [ProductController::class, 'search_product'])->name('search.product');
//product all route end

Route::get('/yejrabox',[UserController::class, 'yajrabox_datatable']);

// openweather Api consumptions route
Route::get('/weatherapi',[WeatherAPIController::class, 'get_weather']);
