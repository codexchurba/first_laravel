<?php

use Illuminate\Http\Request;
use App\Http\Controllers\GetDataController;
use App\Http\Controllers\EditDataController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/table', [GetDataController::class, 'tabledata']);
Route::delete('/table/delete/{activity}', [EditDataController::class, 'destroy']);
Route::put('/table/edit/{selectedId}', [EditDataController::class, 'update']);


Route::prefix('/table')->group( function() {
    Route::put('/edit/{selectedId}', [EditDataController::class, 'update']);
});
