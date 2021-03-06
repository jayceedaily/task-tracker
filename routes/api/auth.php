<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('auth/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth/token')->group(function(){

    Route::post('/', ['App\Http\Controllers\Token\CreateController','handle']);

});

