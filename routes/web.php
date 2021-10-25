<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
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

Route::get('/', [productsController::class, 'getProducts']);
Route::view('add', 'add');
Route::post('add', [productsController::class, 'setProductsData']);
Route::get('details/{id}', [productsController::class, 'getProductData']);
Route::get('edit/{id}', [productsController::class, 'getEditData']);
Route::post('edit', [productsController::class, 'editProductData']);
Route::get('delete/{id}', [productsController::class, 'deleteProductData']);
Route::view('register', 'register');
Route::post('register', [productsController::class, 'registerUser']);
Route::view('login', 'login');
Route::post('login', [productsController::class, 'loginUser']);
Route::get('logout', [productsController::class, 'logoutUser']);