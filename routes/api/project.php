<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function(){

    Route::prefix('project')->group(function(){

        Route::get('/', ['App\Http\Controllers\ProjectController','index']);

        Route::post('/', ['App\Http\Controllers\ProjectController','create']);

        Route::get('/{project:uuid}', ['App\Http\Controllers\ProjectController','show']);

        Route::put('/{project:uuid}', ['App\Http\Controllers\ProjectController','edit']);

    });

});

