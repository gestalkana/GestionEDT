<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
    ];

    // Un professeur enseigne plusieurs matières
    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }

    // Un professeur peut apparaître dans plusieurs emplois du temps
    public function emplois()
    {
        return $this->hasMany(EmploiDuTemps::class);
    }
}
