<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\GetDataController;
use App\Http\Controllers\EditDataController;

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


// go to a page
Route::get('/table', function () {
    return view('table');
})->name('table');

Route::get('/', function () {
    return view('index');
})->name('index');


Route::resource('activities', GetDataController::class);
Route::resource('activities', EditDataController::class);
Route::resource('/table/edit', EditDataController::class);
Route::post('create',[CreateController::class, 'store']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

