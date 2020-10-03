<?php

namespace Database\Factories;

use App\Models\Season;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeasonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Season::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Verão 2020',
            'maxScore' => '20',
            'minScore' => '5', 
            'maxScoreCounter' => '1', 
            'minScoreCounter' => '2', 
        ];
    }
}
