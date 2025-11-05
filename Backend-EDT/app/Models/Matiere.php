<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'duree',
        'professeur_id',
    ];

    // Cette matière appartient à un professeur
    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    // Cette matière peut apparaître dans plusieurs emplois du temps
    public function emplois()
    {
        return $this->hasMany(EmploiDuTemps::class);
    }
}
