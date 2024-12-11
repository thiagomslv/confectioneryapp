<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BranchesController;
use App\Http\Controllers\StockController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::group(['prefix' => 'branches'], function (){

    Route::get('/', [BranchesController::class, 'index'])->name('branches.index');
    Route::get('/create', [BranchesController::class, 'create'])->name('branches.create');
    Route::post('/store', [BranchesController::class, 'store'])->name('branches.store');

    Route::get('/edit/{id}', [BranchesController::class, 'edit'])->name('branches.edit');
    Route::post('/update/{id}', [BranchesController::class, 'update'])->name('branches.update');
    Route::post('/destroy/{id}', [BranchesController::class, 'destroy'])->name('branches.destroy');

    Route::get('/map', [BranchesController::class, 'branchesMap'])->name('branches.map');

    //Rotas para controle do estoque.
    Route::group(['prefix' => 'stock'], function (){

        Route::get('/', [StockController::class, 'index'])->name('branches.stock');
        Route::get('/show/{id}', [StockController::class, 'show'])->name('branches.stock.show');

        Route::post('/store', [StockController::class, 'store'])->name('branches.stock.store');
        Route::post('/update/{id}', [StockController::class, 'update'])->name('branches.stock.update');

        Route::post('/destroy/{id}', [StockController::class, 'destroy'])->name('branches.stock.destroy');

        Route::get('/search/{id}/{name}', [StockController::class, 'searchProduct'])->name('branches.stock.search');
    });
});