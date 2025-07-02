<?php

declare(strict_types=1);

use App\Services\GameCalculation\Contracts\GameManager;
use App\Services\Randomizer\Contracts\RandomScoreGenerator;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.register');
})->name('signup');

// Todo: middleware by hash
Route::get('/game', function (GameManager $gameManager, RandomScoreGenerator $randomScoreGenerator) {
    return print_r($gameManager->calculate($randomScoreGenerator->generate()));
})->name('game');
