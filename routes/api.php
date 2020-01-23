<?php

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

Route::get('/user/stats/get', \App\Http\Controllers\MainController::controller() . '@getUserStats')->name('user.stats.get');
Route::post('/game/start', \App\Http\Controllers\MainController::controller() . '@startGame')->name('game.start');
Route::post('/game/finish', \App\Http\Controllers\MainController::controller() . '@finishGame')->name('game.finish');
