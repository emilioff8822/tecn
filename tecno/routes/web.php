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

use App\Http\Controllers\ServiziController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\ListinoController;
use App\Http\Controllers\VenditaController;

Route::resource('servizis', ServiziController::class);
Route::resource('points', PointController::class);
Route::resource('listinos', ListinoController::class);
Route::resource('venditas', VenditaController::class);


Route::get('/', function () {
    return view('welcome');
});