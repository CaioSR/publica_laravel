<?php

namespace App\Services;

use App\Models\Season;
use App\Models\Game;

class UpdateSeasonScore
{
    public function verifyScore(Season $season, Game $game)
    {
        if ($game->score > $season->maxScore){
            $this->updateMaxScore($season, $game->score);
        }else if ($game->score < $season->minScore){
            $this->updateMinScore($season, $game->score);
        }

        if ($season->minScore == 0){
            $season->minScore = $game->score;
            $season->save();
        }
    }

    /*
    * Atualiza a pontuação máxima e caso não seja o primeiro jogo, aumenta a quantidade de quebra de recorde
    */
    private function updateMaxScore(Season $season, int $score) 
    {
        if ($season->maxScore > 0){
            $season->maxScoreCounter++;
        }
        $season->maxScore = $score;
        $season->save();
    }

    /*
    * Atualiza a pontuação mínima e caso não seja o primeiro jogo, aumenta a quantidade de quebra de recorde
    */
    private function updateMinScore(Season $season, int $score) 
    {
        if ($season->minScore > 0){
            $season->minScoreCounter++;
        }
        $season->minScore = $score;
        $season->save();
    }

}