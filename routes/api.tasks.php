<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('live', function () {
    return response()->json(['service' => 'tasks', 'version' => 1], 200);
});

Route::get("", [TaskController::class, "index"])->name('tasks.index');
Route::get("{task_id}", [TaskController::class, "find"])->name('tasks.find');
Route::post('', [TaskController::class, 'store'])->name('tasks.store');
Route::put('{task_id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('{task_id}', [TaskController::class, 'destroy'])->name('tasks.destroy');