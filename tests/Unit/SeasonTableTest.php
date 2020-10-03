<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Season;

class SeasonTableTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa criação de Temporada.
     *
     * @return void
     */
    public function testSeasonCreation()
    {
        $season = Season::factory()->create();

        $this->assertDatabaseHas('seasons', [
            'name' => 'Verão 2020',
            'maxScore' => '20',
            'minScore' => '5',
            'maxScoreCounter' => '1',
            'minScoreCounter' => '2',
        ]);
    }

    
    /**
     * Testa recuperação de Temporadas.
     *
     * @return void
     */
    public function testSeasonFetching()
    {
        Season::factory()->count(3)->create();
        $seasons = Season::all();
        $this->assertCount(4, $seasons);
    }

    /**
     * Testa atualização de Temporadas.
     *
     * @return void
     */
    public function testSeasonUpdating()
    {
        $season = Season::find(2);
        $season->name = 'Inverno 2019';
        $season->save();
        $this->assertDatabaseHas('seasons', [
            'name' => 'Inverno 2019',
            'maxScore' => '20',
            'minScore' => '5',
            'maxScoreCounter' => '1',
            'minScoreCounter' => '2',
        ]);
    }

    /**
     * Testa deleção de Temporadas.
     *
     * @return void
     */
    public function testSeasonDeletion()
    {
        Season::find(1)->delete();
        $this->assertDatabaseCount('seasons', 3);
    }
}
