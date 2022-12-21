<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleManager;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//product controller
Route::get('/product/create', [ProductController::class, 'create_product'])->name('create.product');
Route::post('/product/store', [ProductController::class, 'product_store'])->name('product.store');
Route::get('/product/view', [ProductController::class, 'view_product'])->name('view.product');
Route::get('/product/delete/{product_id}', [ProductController::class, 'product_delete'])->name('product.delete');
Route::get('/product/edit/{product_id}', [ProductController::class, 'product_edit'])->name('product.edit');
Route::post('/product/update', [ProductController::class, 'product_update'])->name('product.update');

//rolemanager
Route::get('/create/role', [RoleManager::class, 'create_permission'])->name('create.permission');
Route::post('/create/permission', [RoleManager::class, 'permission_store'])->name('permission.store');
Route::post('/store/role', [RoleManager::class, 'role_store'])->name('role.store');
Route::post('/role/assign', [RoleManager::class, 'assign_role'])->name('assign.role');
Route::get('/role/view', [RoleManager::class, 'view_role'])->name('view.role');

