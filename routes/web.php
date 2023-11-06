<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PRodutosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendaController;
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
    return view('index');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [PRodutosController::class, 'index'])->name('produto.index');

    Route::get('/cadastrarProduto', [PRodutosController::class, 'cadastrarProduto'])->name('produto.create');
    Route::post('/cadastrarProduto', [PRodutosController::class, 'cadastrarProduto'])->name('produto.create');

    Route::get('/atualizarProduto/{id}', [PRodutosController::class, 'atualizarProduto'])->name('produto.update');
    Route::put('/atualizarProduto/{id}', [PRodutosController::class, 'atualizarProduto'])->name('produto.update');

    Route::delete('/', [PRodutosController::class, 'delete'])->name('produto.delete');
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClientesController::class, 'index'])->name('cliente.index');

    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cliente.create');
    Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cliente.create');

    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('cliente.update');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('cliente.update');

    Route::delete('/', [ClientesController::class, 'delete'])->name('cliente.delete');
});

Route::prefix('vendas')->group(function () {
    Route::get('/', [VendaController::class, 'index'])->name('venda.index');

    Route::get('/cadastrarVenda', [VendaController::class, 'cadastrarVenda'])->name('venda.create');
    Route::post('/cadastrarVenda', [VendaController::class, 'cadastrarVenda'])->name('venda.create');
    Route::get('/enviaComprovantePorEmail/{id}', [VendaController::class, 'enviaComprovantePorEmail'])->name('venda.enviaComprovantePorEmail');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::get('/cadastrar', [UserController::class, 'cadastrar'])->name('user.create');
    Route::post('/cadastrar', [UserController::class, 'cadastrar'])->name('user.create');

    Route::get('/atualizar/{id}', [UserController::class, 'atualizar'])->name('user.update');
    Route::put('/atualizar/{id}', [UserController::class, 'atualizar'])->name('user.update');

    Route::delete('/', [UserController::class, 'delete'])->name('user.delete');
});