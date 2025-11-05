<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalleRequest;
use App\Http\Requests\UpdateSalleRequest;
use App\Models\Salle;

class SalleController extends Controller
{
    public function index()
    {
        return Salle::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'capacite' => 'nullable|integer',
        ]);

        return Salle::create($request->all());
    }

    public function show(Salle $salle)
    {
        return $salle;
    }

    public function update(Request $request, Salle $salle)
    {
        $request->validate([
            'nom' => 'sometimes|string',
            'capacite' => 'sometimes|integer|nullable',
        ]);

        $salle->update($request->all());
        return $salle;
    }

    public function destroy(Salle $salle)
    {
        $salle->delete();
        return response()->json(null, 204);
    }
}
