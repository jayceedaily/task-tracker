<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function(){

    Route::prefix('project')->group(function(){

        Route::get('/{project:uuid}/task', ['App\Http\Controllers\Task\IndexController','handle']);

        Route::post('/{project:uuid}/task', ['App\Http\Controllers\Task\CreateController','handle']);

    });

    Route::prefix('task')->group(function(){

        Route::get('/{task:uuid}',  ['App\Http\Controllers\Task\ShowController','handle']);

        Route::put('/{task:uuid}',  ['App\Http\Controllers\Task\EditController','handle']);

        Route::delete('/{task:uuid}',  ['App\Http\Controllers\Task\DeleteController','handle']);

    });

});
