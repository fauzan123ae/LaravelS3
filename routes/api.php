<?php

use App\Http\Controllers\api\authController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TaskController as ApiController;
<<<<<<< HEAD

=======
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<<<<<<< HEAD
Route::post('logout', [authController::class, "Logout"]);

Route::post('loginapi',[authController::class,"Login"]);

Route::apiResource('ApiTasks', ApiController::class);
=======
Route::apiResource('ApiTask', ApiController::class);

// Logout

Route::post('logoutapi', [authController::class,"logoutapi"]);
// Login
Route::post('login', [authController::class, "login"]);

Route::apiResource('ApiTask', ApiController::class);
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
