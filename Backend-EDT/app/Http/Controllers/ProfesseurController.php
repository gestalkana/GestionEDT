<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfesseurRequest;
use App\Http\Requests\UpdateProfesseurRequest;
use App\Models\Professeur;


class ProfesseurController extends Controller
{
    public function index()
    {
        return Professeur::with('matieres')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email|unique:professeurs',
        ]);

        return Professeur::create($request->all());
    }

    public function show(Professeur $professeur)
    {
        return $professeur->load('matieres');
    }

    public function update(Request $request, Professeur $professeur)
    {
        $request->validate([
            'nom' => 'sometimes|string',
            'email' => 'sometimes|email|unique:professeurs,email,' . $professeur->id,
        ]);

        $professeur->update($request->all());
        return $professeur;
    }

    public function destroy(Professeur $professeur)
    {
        $professeur->delete();
        return response()->json(null, 204);
    }
}
