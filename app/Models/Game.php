<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season;

class Game extends Model
{
    use HasFactory;

    public function seasons()
    {
        return $this->belongsTo('App\Models\Season', 'season_id');
    }
}
