<?php

use App\Http\Controllers\CheckInvoiceController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Information;
use App\Http\Controllers\ManageBrandController;
use App\Http\Controllers\ManageCategoryController;
use App\Http\Controllers\ManageProductController;

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

Route::get('/', [IndexController::class, 'index']);

Route::get('/category/{category:slug}', [IndexController::class, 'category']);
Route::get('/order/{brand:slug}', [OrderController::class, 'index']);
Route::get('/inv/{order:invoice}', [OrderController::class, 'paid']);
Route::post('/order/{brand:slug}', [OrderController::class, 'order']);
Route::get('/user/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/user/login', [UserController::class, 'loginRequest'])->middleware('guest')->name('login-request');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::resource('/dashboard/product', ManageProductController::class)->middleware('admin');
Route::resource('/dashboard/brand', ManageBrandController::class)->middleware('admin');
Route::resource('/dashboard/category', ManageCategoryController::class)->middleware('admin');

Route::get('check', [CheckInvoiceController::class, 'check']);
Route::post('check', [CheckInvoiceController::class, 'checkRequest']);

Route::get('tentang', [Information::class, 'about']);
Route::get('ketentuan-layanan', [Information::class, 'service']);
Route::get('kebijakan-privasi', [Information::class, 'privacy']);
