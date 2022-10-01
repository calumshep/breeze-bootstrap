<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CreditController;
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

Route::controller(AccountController::class)
    ->middleware(['auth'])
    ->group(function () {
    Route::get('/account', 'showOwn')->name('account.own');
    Route::put('/account/{user}', 'update')->name('account.update');
});

Route::controller(CreditController::class)

    ->group(function () {
    Route::post('/purchase', 'purchase')->name('purchase');
});

Route::resource('trainees', TraineeController::class);

Route::controller(BookingController::class)
    ->name('sessions.')
    ->prefix('/sessions')
    ->group(function ()
{
    Route::post('{session}/book', 'book')->name('book');
});

Route::resource('sessions', SessionController::class)->middleware(['can:manage training sessions']);

Route::controller(AdminController::class)
    ->name('admin.')
    ->prefix('/admin')
    ->middleware(['can:see user details'])
    ->group(function ()
{
    Route::get('users', 'index')->name('index');
    Route::get('users/{user}', 'index')->name('show');
});
