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

// Main index page
Route::get('/', function ()
{
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function ()
{
    return view('dashboard', [
        'sessions' => \App\Models\Session::orderBy('time')->paginate(5)
    ]);
})->middleware(['auth'])->name('dashboard');

// Auth routes
require __DIR__.'/auth.php';
Route::controller(AccountController::class)
    ->middleware(['auth'])
    ->group(function ()
{
    Route::get('/account', 'showOwn')->name('account.own');
    Route::put('/account/{user}', 'update')->name('account.update');
});

// Basic resources
Route::resource('trainees', TraineeController::class);
Route::controller(SessionController::class)
    ->middleware(['auth'])
    ->group(function ()
{
    Route::get('/sessions/{session}/view', 'view')->name('sessions.view');
});
Route::resource('sessions', SessionController::class)->middleware(['can:manage training sessions']);

// Credit increase routes
Route::controller(CreditController::class)
    ->name('credit.')
    ->prefix('/credit')
    ->group(function ()
{
    Route::middleware(['can:see user details'])->group(function ()
    {
        Route::post('/add', 'add')->name('add');
        Route::post('/set', 'set')->name('set');
    });
    Route::post('/purchase', 'purchase')->name('purchase');
});

// Session booking routes
Route::controller(BookingController::class)
    ->name('sessions.')
    ->prefix('/sessions')
    ->group(function ()
{
    Route::post('{session}/book', 'book')->name('book');
});

// Admin routes
Route::controller(AdminController::class)
    ->name('admin.')
    ->prefix('/admin')
    ->middleware(['can:see user details'])
    ->group(function ()
{
    Route::get('/', 'index')->name('index');
    Route::get('users/{user}', 'show')->name('users.show');
    Route::get('users/{user}/trainees/{trainee}', 'trainee')->name('users.trainee');
    Route::get('users/{user}/edit', 'edit')->name('users.edit');
});
