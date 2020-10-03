<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\UpdateSeasonScore;
use App\Models\Season;
use App\Models\Game;

class ScoreUpdateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testScoreUpdate()
    {
        $season = Season::create(['name' => 'Verão 2020']);

        Game::create([
            'season_id' => 1,
            'score' => 20,
        ]);

        Game::create([
            'season_id' => 1,
            'score' => 10,
        ]);
        
        Game::create([
            'season_id' => 1,
            'score' => 5,
        ]);

        Game::create([
            'season_id' => 1,
            'score' => 25,
        ]);

        $scoreUpdater = new UpdateSeasonScore();

        $game = Game::find(1);
        $scoreUpdater->verifyScore($season, $game);
        $this->assertEquals(20, $season->maxScore);
        $this->assertEquals(20, $season->minScore);
        $this->assertEquals(0, $season->maxScoreCounter);
        $this->assertEquals(0, $season->minScoreCounter);

        $game = Game::find(2);
        $scoreUpdater->verifyScore($season, $game);
        $this->assertEquals(20, $season->maxScore);
        $this->assertEquals(10, $season->minScore);
        $this->assertEquals(0, $season->maxScoreCounter);
        $this->assertEquals(1, $season->minScoreCounter);

        $game = Game::find(3);
        $scoreUpdater->verifyScore($season, $game);
        $this->assertEquals(20, $season->maxScore);
        $this->assertEquals(5, $season->minScore);
        $this->assertEquals(0, $season->maxScoreCounter);
        $this->assertEquals(2, $season->minScoreCounter);

        $game = Game::find(4);
        $scoreUpdater->verifyScore($season, $game);
        $this->assertEquals(25, $season->maxScore);
        $this->assertEquals(5, $season->minScore);
        $this->assertEquals(1, $season->maxScoreCounter);
        $this->assertEquals(2, $season->minScoreCounter);

    }
}
