<?php

namespace App\Http\Controllers;

use App\Ciclo;
use App\Ncurso;
use App\Programa;
use Illuminate\Http\Request;
use App\Http\Requests\NcursoRequest;

class NcursoController extends Controller
{
    public function index()
    {
        $ncursos = Ncurso::all();
        return view('ncurso.index', compact('ncursos'));
    }

    public function create()
    {
        $ciclos = Ciclo::all();
        $programas = Programa::all();
        return view('ncurso.create', compact('ciclos', 'programas'));
    }

    public function store(NcursoRequest $request)
    {
        Ncurso::create($request->all());
        return redirect('ncurso')->with('success', 'Curso Registrado!');
    }

    public function show($id)
    {
        $ncurso = Ncurso::findOrFail($id);
        return view('ncurso.show', compact('ncurso'));
    }

    public function edit($id)
    {
        $ncurso = Ncurso::findOrFail($id);
        $ciclos = Ciclo::all();
        $programas = Programa::all();
        return view('ncurso.edit', compact('ncurso', 'ciclos', 'programas'));
    }

    public function update(NcursoRequest $request, $id)
    {
        $ncurso = Ncurso::findOrFail($id)->fill($request->all());

        if ($ncurso->isDirty()) {
            $ncurso->save();
            return redirect('ncurso')->with('success', 'Curso Actualizado!');
        }
        return redirect('ncurso')->with('error', 'No detectaron cambios');
    }

    public function destroy($id)
    {
        Ncurso::findOrFail($id)->delete();
        return redirect('ncurso')->with('success', 'Curso Eliminado!');
    }
}
