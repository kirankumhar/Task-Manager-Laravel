<?php 
use App\Http\Controllers\TaskController;

Route::get('/tasks-all', [TaskController::class, 'getTasks']);
