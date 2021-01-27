<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function(){

    Route::prefix('project')->group(function(){

        Route::get('/{project:uuid}/member', ['App\Http\Controllers\ProjectMember\IndexController','handle']);

        Route::post('/{project:uuid}/member', ['App\Http\Controllers\ProjectMember\CreateController','handle']);

    });

    Route::prefix('project-member')->group(function(){

        Route::get('/{projectMember:uuid}',  ['App\Http\Controllers\ProjectMember\ShowController','handle']);

        Route::put('/{projectMember:uuid}',  ['App\Http\Controllers\ProjectMember\EditController','handle']);

        Route::delete('/{projectMember:uuid}',  ['App\Http\Controllers\ProjectMember\DeleteController','handle']);

    });

});

