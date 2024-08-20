<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller(\App\Http\Controllers\ExampleController::class)->prefix('example')->name('example.')->group(function () {
    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');

    Route::get('/edit/{uuid}', 'edit')->name('edit');
    Route::post('/edit/{uuid}', 'update')->name('update');

    Route::get('/delete/{uuid}', 'destroy')->name('destroy');
});