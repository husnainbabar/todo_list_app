<?php

use Illuminate\Support\Facades\Route;
use app\Http\Livewire\Tasks\Index;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/1', function () {
    return view('livewire.tasks.index');
});

// Route::livewire('task', 'task');
Route::get('/tasks', App\Http\Livewire\Tasks\Index::class);
