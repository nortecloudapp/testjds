<?php

namespace App\Http\Controllers;

use App\Ciclo;
use App\Http\Requests\CicloRequest;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    public function index()
    {
        $ciclos = Ciclo::all();
        return view('ciclo.index', compact('ciclos'));
    }

    public function create()
    {
        return view('ciclo.create');
    }

    public function store(CicloRequest $request)
    {
        Ciclo::create($request->all());
        return redirect('ciclo')->with('success', 'Nro de Ciclo Registrado!');
    }

    public function show($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        return view('ciclo.show', compact('ciclo'));
    }

    public function edit($id)
    {
        $ciclo = Ciclo::findOrFail($id);
        return view('ciclo.edit', compact('ciclo'));
    }

    public function update(Request $request, $id)
    {
        $ciclo = Ciclo::findOrFail($id)->fill($request->all());

        if ($ciclo->isDirty()) {
            $ciclo->save();
            return redirect('ciclo')->with('success', 'Nro de Ciclo Actualizado!');
        }
        return redirect('ciclo')->with('error', 'No detectaron cambios');
    }

    public function destroy($id)
    {
        Ciclo::findOrFail($id)->delete();
        return redirect('ciclo')->with('success', 'Ciclo Eliminado!');
    }
}
