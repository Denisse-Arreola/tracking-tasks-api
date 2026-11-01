<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return response()->json(['live' => 'Hello World'], 200);
});

Route::prefix('auth')->group(function () {
    require __DIR__ . '/api.auth.php';
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('teams')->group(function () {
        require __DIR__ . '/api.teams.php';
    });

    Route::prefix('tasks')->group(function () {
        require __DIR__ . '/api.tasks.php';
    });

    Route::prefix('users')->group(function () {
        require __DIR__ . '/api.users.php';
    });
});
