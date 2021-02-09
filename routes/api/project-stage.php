<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function(){

    Route::prefix('project')->group(function(){

        Route::get('/{project:uuid}/stage', ['App\Http\Controllers\ProjectStage\IndexController','handle']);

        Route::post('/{project:uuid}/stage', ['App\Http\Controllers\ProjectStage\CreateController','handle']);

    });

    Route::prefix('project-stage')->group(function(){

        Route::get('/{projectStage:uuid}',  ['App\Http\Controllers\ProjectStage\ShowController','handle']);

        Route::put('/{projectStage:uuid}',  ['App\Http\Controllers\ProjectStage\EditController','handle']);

        Route::delete('/{projectStage:uuid}',  ['App\Http\Controllers\ProjectStage\DeleteController','handle']);

    });

});

