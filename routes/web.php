<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\GameController;

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
    return redirect('/seasons');
});

Route::resource('seasons', SeasonController::class);
Route::get('games/{id}', [GameController::class, 'index'])->name('games.create');
Route::get('games/{id}/create', [GameController::class, 'create'])->name('games->create');
Route::post('games/{id}', [GameController::class, 'store'])->name('games->store');