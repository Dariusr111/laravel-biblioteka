<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Auth::routes();

Route::middleware(['auth', 'administrator'])->group(function (){
    Route::post('books/filter',[BookController::class,'filterBooks'])->name('books.filter');
    Route::resources([
        'categories'=> CategoryController::class,
        'books'=> BookController::class
    ]);
    Route::get('categories/{id}/books', [BookController::class, 'categoryBooks'])->name('categoryBooks');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
