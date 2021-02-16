<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function(){

    Route::prefix('comment')->group(function(){

        Route::get('/{commentable}/{uuid}', ['App\Http\Controllers\CommentController','index']);

        Route::post('/{commentable}/{uuid}', ['App\Http\Controllers\CommentController','create']);

        Route::get('/{comment:uuid}', ['App\Http\Controllers\CommentController','show']);

        Route::put('/{comment:uuid}', ['App\Http\Controllers\CommentController','edit']);

    });

});

