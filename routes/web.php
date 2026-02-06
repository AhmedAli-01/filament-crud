<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// 1. The Index (List)
Route::get('/tasks', function () {
    return view('tasks-index', [
        'tasks' => Task::with('project')->where('status', 'done')->get()
    ]);
});

// 2. The Show (Detail) - PLACE IT HERE
Route::get('/tasks/{task:slug}', function (Task $task) {
    return view('tasks-show', [
        'task' => $task
    ]);
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__ . '/settings.php';