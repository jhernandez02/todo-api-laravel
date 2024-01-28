<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;

Route::prefix('v1')->group(function(){
    
    Route::post('login', [AuthController::class, 'login'])->name('api.login');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::resource('tasks', TaskController::class);
        Route::get('logout', [AuthController::class, 'logout']);
    });

    Route::get('/error/403', function(){
        return response(['message'=> 'Forbidden'], 403);
    })->name('api.error.403');
    
});
