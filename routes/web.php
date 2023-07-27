<?php

use App\Http\Controllers\ProductorController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Fierros\Create as CreateFierro;
use App\Http\Livewire\Ganado\Create as CreateGanado;
use App\Http\Livewire\Ganado\Edit as EditGanado;
use App\Http\Livewire\Patentes\Create as CreatePatente;
use App\Http\Livewire\Patentes\Edit as EditPatente;
use App\Http\Livewire\Patentes\Show as ShowPatente;
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
    //Rutas Ganado
    Route::get('/productor/{productore}/ganado/create',CreateGanado::class)->name('ganado.create');
    Route::get('/productores/{productore}/ganado/edit/{ganado}',EditGanado::class)->name('ganado.edit');
    //Rutas propiedades
    Route::get('/productores/{productore}/propiedades/create',CreatePropiedad::class)->name('propiedades.create');
    Route::get('/productores/{productore}/propiedades/{propiedad}/edit',EditPropiedad::class)->name('propiedades.edit');
    //Rutas patentes
    Route::get('/productores/{productore}/patente/create',CreatePatente::class)->name('patente.create');
    Route::get('/productores/{productore}/patente/{patente}/edit',EditPatente::class)->name('patente.edit');
    Route::get('/productores/{productore}/patente/{patente}',ShowPatente::class)->name('patente.show');
    Route::get('/productores/{productore}/patente/{patente}/fierro',CreateFierro::class)->name('fierro.create');
    
});

require __DIR__.'/auth.php';
