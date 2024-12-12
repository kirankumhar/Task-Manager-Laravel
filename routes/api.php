<?php 
use App\Http\Controllers\TaskController;

Route::get('/tasks-all', [TaskController::class, 'getTasks']);
Route::post('/tasks-all/completed/{id}', [TaskController::class, 'markAsCompleted']);