<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Models\Project;

Route::middleware(['auth:sanctum'])->group(function(){

    Route::prefix('project')->group(function(){

        Route::get('/', [ProjectController::class,'index']);

        Route::post('/', [ProjectController::class,'create']);

        Route::get('/{project:uuid}', [ProjectController::class,'show']);

        Route::put('/{project:uuid}', [ProjectController::class,'edit']);

    });

});

