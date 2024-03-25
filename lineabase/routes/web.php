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
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware'=>['auth']],function(){
    Route::view('/lineabase', 'pages/lineabase/index')->name('lineabase.index');
    Route::view('/lineabase/new', 'pages/lineabase/create')->name('lineabase.create');
    //Route::view('/lineabase/{id}', 'pages/lineabase/update')->name('lineabase.update');
});
