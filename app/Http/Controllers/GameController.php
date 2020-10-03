<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Season;
use App\Services\UpdateSeasonScore;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $games = Game::where('season_id', $id)->get();
        $season = Season::findOrFail($id);
        return view('games.index', ['games' => $games, 'season' => $season]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        return view('games.create', ['season_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'season_id' => 'required',
            'score' => 'required',
        ]);

        $game = new Game;
        $game->season_id = $request->input('season_id');
        $game->score = $request->input('score');
        $game->save();

        $seasonScoreVerifier = new UpdateSeasonScore();
        $seasonScoreVerifier->verifyScore($game->season, $game);

        return redirect('/games/'.$request->input('season_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
