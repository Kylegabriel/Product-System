<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DesignationController;
use Illuminate\Support\Facades\Route;


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

// Route::resource('dashboard', DashboardController::class);
Route::resource('products', ProductsController::class); 
Route::resource('settings', SettingsController::class)->only([
    'index'
]);;
Route::resource('designation', DesignationController::class)->except([
    'create','show'
]);;

Route::get('supplier/get-supplier-list',[ProductsController::class,'getSupplierList']);
Route::get('category/get-category-list',[ProductsController::class,'getCategoryList']);