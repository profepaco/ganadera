<?php

use App\Http\Controllers\ProductorController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Ganado\Create as CreateGanado;
use App\Http\Livewire\Ganado\Edit as EditGanado;
use App\Http\Livewire\Propiedades\Create as CreatePropiedad;
use App\Http\Livewire\Propiedades\Edit as EditPropiedad;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/productores',ProductorController::class);
    Route::get('/productor/{productore}/ganado',CreateGanado::class)->name('ganado.create');
    Route::get('/productores/{productore}/ganado/{ganado}',EditGanado::class)->name('ganado.edit');
    Route::get('/productores/{productore}/propiedades',CreatePropiedad::class)->name('propiedades.create');
    Route::get('/productores/{productore}/propiedades/{propiedad}',EditPropiedad::class)->name('propiedades.edit');
});

require __DIR__.'/auth.php';
