<?php

use App\Http\Controllers\API\ArticlesAPIController;
use App\Http\Controllers\API\CategoriesAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//echo "asdasd";die;

Route::get('/articles',[ArticlesAPIController::class, 'articles'])->name('api.articles'); //semua artikel
Route::post('/articles/simpan',[ArticlesAPIController::class, 'simpan'])->name('api.simpan');
Route::post('/articles/update/{id}',[ArticlesAPIController::class, 'update'])->name('api.update');
Route::post('/articles/hapus/{id}',[ArticlesAPIController::class, 'hapus'])->name('api.hapus');
Route::any('/articles/{title_url}',[ArticlesAPIController::class, 'detail'])->name('api.detail');

Route::get('/categories',[CategoriesAPIController::class, 'categories'])->name('api.categories'); //categorie
Route::post('/categories/simpan',[CategoriesAPIController::class, 'simpan'])->name('api.simpancategories');
Route::post('/categories/update/{id}',[CategoriesAPIController::class, 'update'])->name('api.updatecategories');
Route::post('/categories/hapus/{id}',[CategoriesAPIController::class, 'hapus'])->name('api.hapuscategories');



//Route::get('/articles/detail/{title_url}',[ArticlesAPIController::class, 'articles'])->name('api.articles.detail'); //detail artikel berdasarkan url
//Route::any('/articles/tambah',[ArticlesAPIController::class, 'articles'])->name('api.articles');
// Route::post('/articles/update',[ArticlesAPIController::class, 'articles'])->name('articles');
// Route::get('/articles/delete/{id}',[ArticlesAPIController::class, 'articles'])->name('articles');




