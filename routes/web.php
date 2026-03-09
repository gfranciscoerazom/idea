<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/ideas');

Route::middleware('auth')->group(function () {
    Route::get('/ideas', [IdeaController::class, 'index'])->name('idea.index');
    Route::post('/ideas', [IdeaController::class, 'store'])->name('idea.store');
    Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('idea.show'); // ->can('workWith', 'idea');
    Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');
    Route::patch('/ideas/{idea}', [IdeaController::class, 'update'])->name('idea.destroy');
    Route::delete('/ideas/{idea}/images', [IdeaImageController::class, 'destroy'])->name('idea.image.destroy');

    Route::patch('/steps/{step}', [StepController::class, 'update'])->name('step.update');

    Route::post('/logout', [SessionsController::class, 'destroy']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'store']);
});
// Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest');
// Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

// Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
// Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
