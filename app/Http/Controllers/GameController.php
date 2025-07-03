<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Game\Contracts\GameRunnerContract;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct(
        private readonly GameRunnerContract $gameRunner,
    ) {

    }

    public function index(Request $request)
    {
        return view('pages.game', []);
    }

    public function run(Request $request)
    {
        $result = $this->gameRunner->run(auth()->id());

        return view('pages.game', [
            'score'       => $result->score,
            'sum'         => $result->sum,
            'status'      => $result->status->value,
            'statusLabel' => $result->status->getLabel(),
        ]);
    }

    public function history(Request $request)
    {
        // Todo: refactor to service with repository / or query
        $history = auth()->user()->lastGameHistories;

        return view('pages.history', [
            'history' => $history,
        ]);
    }
}
