<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Game;

class GameTableTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa criação de Jogo.
     *
     * @return void
     */
    public function testGameCreation()
    {
        Game::factory()->create();

        $this->assertDatabaseHas('games', [
            'season_id' => '1',
            'score' => '5',
        ]);
    }

    
    /**
     * Testa recuperação de Jogos.
     *
     * @return void
     */
    public function testGameFetching()
    {
        Game::factory()->count(3)->create();
        $games = Game::all();
        $this->assertCount(4, $games);
    }

}
