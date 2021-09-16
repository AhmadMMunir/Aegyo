<?php

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
use App\Http\Controllers\UserController;
use App\Http\Controllers\articlesController;
use App\Http\Controllers\categoriesController;
 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return 'Hello World';
});

Route::get('/user}',[UserController::class,'user']);

Route::get('/', [AuthController::class, 'showFormLogin']);
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/articles',[ArticlesController::class, 'articles'])->name('articles');
    Route::get('/articles/{slug}',[ArticlesController::class, 'articles']);
    Route::get('/articles/tambah',[ArticlesController::class, 'tambah']);
    Route::post('/articles/simpan',[ArticlesController::class, 'simpan']);
    Route::get('/articles/ubah/{id}',[ArticlesController::class, 'ubah']);
    Route::post('/articles/update',[ArticlesController::class, 'update']);
    Route::get('/articles/hapus/{id}',[ArticlesController::class, 'hapus']);

    
    Route::get('/categories',[CategoriesController::class, 'categories']);
    Route::get('/categories/tambah',[CategoriesController::class, 'tambah']);
    Route::post('/categories/simpan',[CategoriesController::class, 'simpan']);
    Route::get('/categories/ubah/{id}',[CategoriesController::class, 'ubah']);
    Route::post('/categories/update',[CategoriesController::class, 'update']);
    Route::get('/categories/hapus/{id}',[CategoriesController::class, 'hapus']);
 
});
