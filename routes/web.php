<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
    return view('auth.login');
});
/*
Route::get('/category', function () {
    return view('category.index');
});
Route::get('/category/create',[CategoryController::class,'create']);
*/

Route::resource('category',CategoryController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [CategoryController::class, 'index'])->name('home');

Route::group (['middleware' => 'auth'], function(){
    Route::get('/', [CategoryController::class, 'index'])->name('home');
});