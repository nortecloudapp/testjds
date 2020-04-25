<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Material;
use App\Ncurso;
use Illuminate\Http\Request;

class MaterialController extends Controller
{

    public function index()
    {
        $materiales = Material::paginate(10);
        return view('material.index', compact('materiales'));
    }

    public function create()
    {
        $ncursos = Ncurso::all();
        return view('material.create', compact('ncursos'));
    }

    public function store(MaterialRequest $request)
    {
        Material::create($request->all());
        return redirect('material')->with('success', 'Material Registrado!');
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        return view('material.show', compact('material'));
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        $ncursos = Ncurso::all();
        return view('material.edit', compact('material', 'ncursos'));
    }

    public function update(MaterialRequest $request, $id)
    {
        $material = Material::findOrFail($id)->fill($request->all());

        if ($material->isDirty()) {
            $material->save();
            return redirect('material')->with('success', 'Material Actualizado!');
        }
        return redirect('material')->with('error', 'No detectaron cambios');
    }

    public function destroy($id)
    {
        Material::findOrFail($id)->delete();
        return redirect('material')->with('success', 'Material Eliminado!');
    }
}
