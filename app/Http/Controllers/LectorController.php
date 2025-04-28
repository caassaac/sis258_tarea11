<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use Illuminate\Http\Request;

class LectorController extends Controller
{
    public function index()
    {
        return Lector::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres'   => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'sexo'      => 'required|in:Masculino,Femenino',
            'correo'    => 'required|email|unique:lectors,correo',
            'celular'   => 'required|numeric',
        ]);

        return Lector::create($data);
    }

    public function show(Lector $lector)
    {
        return response()->json($lector);
    }


    public function update(Request $request, Lector $lector)
    {
        $data = $request->validate([
            'nombres'   => 'sometimes|required|string|max:50',
            'apellidos' => 'sometimes|required|string|max:50',
            'sexo'      => 'sometimes|required|in:Masculino,Femenino',
            'correo'    => "sometimes|required|email|unique:lectors,correo,{$lector->id}",
            'celular'   => 'sometimes|required|numeric',
        ]);

        $lector->update($data);
        return $lector;
    }

    public function destroy(Lector $lector)
    {
        $lector->delete();
        return response()->noContent();
    }
}
