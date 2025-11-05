<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;
use App\Models\Classe;

class ClasseController extends Controller
{
    public function index()
    {
        return Classe::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'niveau' => 'required|string',
        ]);

        return Classe::create($request->all());
    }

    public function show(Classe $classe)
    {
        return $classe->load('emplois');
    }

    public function update(Request $request, Classe $classe)
    {
        $request->validate([
            'nom' => 'sometimes|string',
            'niveau' => 'sometimes|string',
        ]);

        $classe->update($request->all());
        return $classe;
    }

    public function destroy(Classe $classe)
    {
        $classe->delete();
        return response()->json(null, 204);
    }
}
