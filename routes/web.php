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
    return redirect()->route('pessoa.index');
})->name('home');

/**
 * Pessoa
 */
$controllerPessoa = \App\Http\Controllers\PessoaController::class;

Route::get('/pessoa', [$controllerPessoa,'index'])->name('pessoa.index');
Route::get('/pessoa/create', [$controllerPessoa,'create'])->name('pessoa.create');
Route::get('/pessoa/{pessoa}', [$controllerPessoa,'show'])->name('pessoa.show');
Route::post('/pessoa', [$controllerPessoa,'store'])->name('pessoa.store');
Route::get('/pessoa/edit/{pessoa}', [$controllerPessoa,'edit'])->name('pessoa.edit');
Route::post('/pessoa/update/{pessoa}', [$controllerPessoa,'update'])->name('pessoa.update');
Route::get('/pessoa/delete/{pessoa}', [$controllerPessoa,'delete'])->name('pessoa.delete');
Route::delete('/pessoa/destroy/{pessoa}', [$controllerPessoa,'destroy'])->name('pessoa.destroy');
