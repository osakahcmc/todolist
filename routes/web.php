<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalenderController;

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

Route::fallback(function () {
    return redirect()->route("home");
});

Route::middleware(['web','api'])->group(function(){
    Route::get('/','Controller@index')->name('home');
    Route::post('/add','Controller@add')->name('add');
    Route::post('/delete','Controller@delete')->name('delete');
    Route::post('/change','Controller@change')->name('change');
});

