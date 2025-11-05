<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmploiDuTempsRequest;
use App\Http\Requests\UpdateEmploiDuTempsRequest;
use App\Models\EmploiDuTemps;

class EmploiDuTempsController extends Controller
{
    public function index()
    {
        return EmploiDuTemps::with(['classe', 'professeur', 'matiere'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'classe_id' => 'required|exists:classes,id',
            'professeur_id' => 'required|exists:professeurs,id',
            'matiere_id' => 'required|exists:matieres,id',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'duree' => 'required|integer',
        ]);

        return EmploiDuTemps::create($request->all());
    }

    public function show(EmploiDuTemps $emploiDuTemps)
    {
        return $emploiDuTemps->load(['classe', 'professeur', 'matiere']);
    }

    public function update(Request $request, EmploiDuTemps $emploiDuTemps)
    {
        $request->validate([
            'classe_id' => 'sometimes|exists:classes,id',
            'professeur_id' => 'sometimes|exists:professeurs,id',
            'matiere_id' => 'sometimes|exists:matieres,id',
            'date' => 'sometimes|date',
            'heure_debut' => 'sometimes',
            'duree' => 'sometimes|integer',
        ]);

        $emploiDuTemps->update($request->all());
        return $emploiDuTemps;
    }

    public function destroy(EmploiDuTemps $emploiDuTemps)
    {
        $emploiDuTemps->delete();
        return response()->json(null, 204);
    }
}
