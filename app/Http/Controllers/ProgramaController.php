<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramaRequest;
use App\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function index()
    {
        $programas = Programa::all();
        return view('programa.index', compact('programas'));
    }

    public function create()
    {
        return view('programa.create');
    }

    public function store(ProgramaRequest $request)
    {
        Programa::create($request->all());
        return redirect('programa')->with('success', 'Programa Registrado!');
    }

    public function show($id)
    {
        $programa = Programa::findOrFail($id);
        return view('programa.show', compact('programa'));
    }

    public function edit($id)
    {
        $programa = Programa::findOrFail($id);
        return view('programa.edit', compact('programa'));
    }

    public function update(ProgramaRequest $request, $id)
    {
        $programa = Programa::findOrFail($id)->fill($request->all());

        if ($programa->isDirty()) {
            $programa->save();
            return redirect('programa')->with('success', 'Programa Actualizado!');
        }
        return redirect('programa')->with('error', 'No detectaron cambios');
    }

    public function destroy($id)
    {
        Programa::findOrFail($id)->delete();
        return redirect('programa')->with('success', 'Programa Eliminado!');
    }
}
