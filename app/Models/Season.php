<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class Season extends Model
{
    use HasFactory;

    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }

    protected $fillable = [
        'name', 
        'maxScore',
        'minScore',
        'maxScoreCounter',
        'minScoreCounter',
    ];
}
