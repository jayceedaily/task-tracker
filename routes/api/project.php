<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function(){

    Route::prefix('project')->group(function(){

        Route::get('/', ['App\Http\Controllers\Project\IndexController','handle']);

        Route::post('/', ['App\Http\Controllers\Project\CreateController','handle']);

        Route::get('/{project:uuid}', ['App\Http\Controllers\Project\ShowController','handle']);

        Route::put('/{project:uuid}', ['App\Http\Controllers\Project\EditController','handle']);

    });

});

