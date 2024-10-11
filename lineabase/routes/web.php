<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DepartamentoCrud;
use App\Http\Livewire\MunicipioCrud;
use App\Http\Livewire\AldeaCrud;

use App\Http\Livewire\Boleta\ControlCrud;

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

    Route::get('/departamentos', DepartamentoCrud::class)->name('departamentos.index');
    Route::get('/municipios', MunicipioCrud::class)->name('municipios.index');
    Route::get('/aldeas', AldeaCrud::class)->name('aldea.index');


    Route::get('/control', ControlCrud::class)->name('control.index');
});
