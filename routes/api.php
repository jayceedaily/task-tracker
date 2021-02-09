<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

require base_path('routes/api/auth.php');

require base_path('routes/api/project.php');

require base_path('routes/api/project-member.php');

require base_path('routes/api/project-stage.php');

require base_path('routes/api/task.php');
