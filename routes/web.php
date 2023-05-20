<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;


// vai virar um controller depois
Route::get('/', function () {
    return view('index');
});


// http://localhost:8989/produtos/maisAlgumacoisa
Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');

    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});