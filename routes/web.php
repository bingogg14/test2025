<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;

/** SignUp Group */
Route::group([], function () {
    Route::get('/', [SignUpController::class, 'index'])->name('signup.index');
    Route::put('/', [SignUpController::class, 'store'])->name('signup.store');
});

/** Auth Group */
Route::get('auth/magic-link/{token}', [AuthController::class, 'authorize'])
    ->name('auth.magic-link');

/** Link Group */
Route::prefix('link')->group(function () {
    Route::get('/{token}', [LinkController::class, 'index'])->name('link.index');
    Route::middleware('auth')->group(function () {
        Route::put('/generate', [LinkController::class, 'store'])->name('link.store');
        //        Route::post('/activate', [LinkController::class, 'activate'])->name('link.activate');
        Route::delete('/revoke', [LinkController::class, 'revoke'])->name('link.revoke');
    });
});

/** Game Group */
Route::middleware('auth')->prefix('game')->group(function () {
    Route::get('/', [GameController::class, 'index'])->name('game.index');
    Route::post('/', [GameController::class, 'run'])->name('game.run');
    Route::get('history', [GameController::class, 'history'])->name('game.history');
});
