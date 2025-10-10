<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    /** @use HasFactory<\Database\Factories\MatiereFactory> */
    use HasFactory;
}
public function professeurs()
{
    return $this->hasMany(Professeur::class);
}

public function emplois()
{
    return $this->hasMany(EmploiDuTemps::class);
}
