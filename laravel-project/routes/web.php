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
Route::get('/confirmed', [UserController::class, 'confirmed'])->name('confirmed');
Route::get('/login', [UserController::class, 'login'])->name('login');


Route::get('/', [TopController::class, 'index'])->name('index');


Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/edit', [CategoryController::class, 'edit'])->name('category.edit');


Route::get('/spending/index', [SpendingController::class, 'index'])->name('spending.index');
Route::get('/spending/create', [SpendingController::class, 'create'])->name('spending.create');
Route::get('/spending/edit', [SpendingController::class, 'edit'])->name('spending.edit');


Route::get('/income_source/index', [IncomeSourceController::class, 'index'])->name('income_source.index');
Route::get('/income_source/create', [IncomeSourceController::class, 'create'])->name('income_source.create');
Route::get('/income_source/edit', [IncomeSourceController::class, 'edit'])->name('income_source.edit');


Route::get('/income/index', [IncomeController::class, 'index'])->name('income.index');
Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
Route::get('/income/edit', [IncomeController::class, 'edit'])->name('income.edit');



// Route::get('/', function () {
//     return view('welcome');
// });
