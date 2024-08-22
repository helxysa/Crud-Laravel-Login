<?php

use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return response() -> json([
//         'status' => true,
//         'message' => "Listar Usuarios", 
        
//     ], 200);
// });


Route::get("/users", [UsersController::class, "index"]);
Route::get('/users/{user}', [UsersController::class, 'show']);
Route::post('/users', [UsersController::class, 'store']);
Route::put('/users/{user}', [UsersController::class, 'update']);
Route::delete('/users/{user}', [UsersController::class, 'delete']);