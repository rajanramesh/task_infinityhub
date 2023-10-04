<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\Admin;
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
    return view('auth.login');
});
Auth::routes();
   
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('products', ProductsController::class);


Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');

//Auth::routes();

Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']);


Route::group(['middleware' => ['admin']], function () {
  
    
    Route::resource('products', ProductsController::class)->except(['index',]);
    Route::get('edit/{id}', [ProductsController::class, 'edit']);
    Route::delete('products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');

});


