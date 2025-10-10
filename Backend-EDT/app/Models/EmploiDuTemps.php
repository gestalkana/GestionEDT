<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiDuTemps extends Model
{
    /** @use HasFactory<\Database\Factories\EmploiDuTempsFactory> */
    use HasFactory;
}
public function classe()
{
    return $this->belongsTo(Classe::class);
}

public function professeur()
{
    return $this->belongsTo(Professeur::class);
}

public function matiere()
{
    return $this->belongsTo(Matiere::class);
}
