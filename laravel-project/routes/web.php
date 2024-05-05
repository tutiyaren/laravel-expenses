<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\IncomeSourceController;
use App\Http\Controllers\IncomeController;


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

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/post', [UserController::class, 'confirmed'])->name('confirmed');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/signin', [UserController::class, 'signin'])->name('signin');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [TopController::class, 'index'])->name('index');
    // カテゴリ
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');
    // 支出
    Route::get('/spending/index', [SpendingController::class, 'index'])->name('spending.index');
    Route::post('/spending/store', [SpendingController::class, 'store'])->name('spending.store');
    Route::get('/spending/create', [SpendingController::class, 'create'])->name('spending.create');
    Route::get('/spending/edit/{id}', [SpendingController::class, 'edit'])->name('spending.edit');
    Route::put('spending/update', [SpendingController::class, 'update'])->name('spending.update');
    Route::delete('/spending/delete', [SpendingController::class, 'delete'])->name('spending.delete');
    // 収入源
    Route::get('/income_source/index', [IncomeSourceController::class, 'index'])->name('income_source.index');
    Route::get('/income_source/create', [IncomeSourceController::class, 'create'])->name('income_source.create');
    Route::post('/income_source/store', [IncomeSourceController::class, 'store'])->name('income_source.store');
    Route::get('/income_source/edit/{id}', [IncomeSourceController::class, 'edit'])->name('income_source.edit');
    Route::put('income_source/update', [IncomeSourceController::class, 'update'])->name('income_source.update');
    Route::delete('/income_source/delete', [IncomeSourceController::class, 'delete'])->name('income_source.delete');
    // 収入
    Route::get('/income/index', [IncomeController::class, 'index'])->name('income.index');
    Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
    Route::post('/income/store', [IncomeController::class, 'store'])->name('income.store');
    Route::get('/income/edit/{id}', [IncomeController::class, 'edit'])->name('income.edit');
    Route::put('income/update', [IncomeController::class, 'update'])->name('income.update');
    Route::delete('/income/delete', [IncomeController::class, 'delete'])->name('income.delete');
});



// Route::get('/', function () {
//     return view('welcome');
// });
