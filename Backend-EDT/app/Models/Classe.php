<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    /** @use HasFactory<\Database\Factories\ClasseFactory> */
    use HasFactory;
}
public function emplois()
{
    return $this->hasMany(EmploiDuTemps::class);
}
