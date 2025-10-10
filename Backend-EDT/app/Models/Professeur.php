<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    /** @use HasFactory<\Database\Factories\ProfesseurFactory> */
    use HasFactory;
}


public function matiere()
{
    return $this->belongsTo(Matiere::class);
}

public function emplois()
{
    return $this->hasMany(EmploiDuTemps::class);
}
