<?php

use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('live', function () {
    return response()->json(['service' => 'teams', 'live' => 'is running']);
});

Route::get("", [TeamController::class, "index"])->name('teams.index');
Route::get("{teamId}", [TeamController::class, "find"])->name('teams.find');
Route::post("", [TeamController::class, "store"])->name('teams.store');
Route::put("{teamId}", [TeamController::class, "update"])->name('teams.update');
Route::delete("{teamId}", [TeamController::class, "destroy"])->name('teams.destroy');
