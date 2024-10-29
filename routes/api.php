<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/vendedor', [VendedorController::class,'criar' ]);
Route::get('/vendedor', [VendedorController::class,'listarTodos' ]);
Route::get('/vendedor/{id}', [VendedorController::class,'listarPeloId' ]);
Route::put('/vendedor/{id}', [VendedorController::class,'editar' ]);
Route::delete('/vendedor/{id}', [VendedorController::class,'remover' ]);

Route::post('/produto', [ProdutoController::class,'criar' ]);
Route::get('/produto', [ProdutoController::class,'listarTodos' ]);
Route::get('/produto/{id}', [ProdutoController::class,'listarPeloId' ]);
Route::put('/produto/{id}', [ProdutoController::class,'editar' ]);
Route::delete('/produto/{id}', [ProdutoController::class,'remover' ]);

