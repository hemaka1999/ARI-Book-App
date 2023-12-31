<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
    return view('auth/login');
});
Route::get('book-list', [BookController::class, 'index'] );
Route::get('add-book', [BookController::class, 'addBook'] );
Route::post('save-book', [BookController::class, 'saveBook'] );
Route::get('edit-book/{id}', [BookController::class, 'editBook'] );
Route::post('update-book', [BookController::class, 'updateBook'] );
Route::get('delete-book/{id}', [BookController::class, 'deleteBook'] );



Auth::routes();

Route::get('/book-list', [App\Http\Controllers\BookController::class, 'index'])->name('book-list');
