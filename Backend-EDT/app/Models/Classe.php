<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'niveau',
    ];

    // Une classe peut avoir plusieurs séances dans l'emploi du temps
    public function emplois()
    {
        return $this->hasMany(EmploiDuTemps::class);
    }
}
