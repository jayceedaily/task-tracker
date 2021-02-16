<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function(){

    Route::prefix('project')->group(function(){

        Route::get('/{project:uuid}/task', ['App\Http\Controllers\TasksController','index']);

        Route::post('/{project:uuid}/task', ['App\Http\Controllers\TasksController','create']);

    });

    Route::prefix('task')->group(function(){

        Route::get('/{task:uuid}',  ['App\Http\Controllers\TasksController','show']);

        Route::put('/{task:uuid}',  ['App\Http\Controllers\TasksController','edit']);

        Route::delete('/{task:uuid}',  ['App\Http\Controllers\TasksController','destroy']);

    });
});
