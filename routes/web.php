<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BranchesController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::group(['prefix' => 'branches'], function (){

    Route::get('/create', [BranchesController::class, 'create']);
});