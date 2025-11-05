<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use App\Models\Matiere;

class MatiereController extends Controller
{
    public function index()
    {
        return Matiere::with('professeur')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'duree' => 'required|integer',
            'professeur_id' => 'required|exists:professeurs,id',
        ]);

        return Matiere::create($request->all());
    }

    public function show(Matiere $matiere)
    {
        return $matiere->load('professeur');
    }

    public function update(Request $request, Matiere $matiere)
    {
        $request->validate([
            'nom' => 'sometimes|string',
            'duree' => 'sometimes|integer',
            'professeur_id' => 'sometimes|exists:professeurs,id',
        ]);

        $matiere->update($request->all());
        return $matiere;
    }

    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
        return response()->json(null, 204);
    }
}
