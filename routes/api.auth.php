<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('live', function () {
    return response()->json(['service' => 'auth', 'version' => 1], 200);
});

Route::post('login', [AuthController::class, 'login'])->name('auth.login');