<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\TraineeController;
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

Route::get('/dashboard', function () {
    return view('dashboard', [
        'sessions' => \App\Models\Session::orderBy('time')->paginate(10)
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('sessions', SessionController::class);
Route::resource('trainees', TraineeController::class);
