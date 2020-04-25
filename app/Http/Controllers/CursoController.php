<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Http\Requests\CursoRequest;
use App\Ncurso;
use App\User;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('curso.index', compact('cursos'));
    }

    public function create()
    {
        $ncursos = Ncurso::all();
        $users = User::all();
        return view('curso.create', compact('ncursos', 'users'));
    }

    public function store(CursoRequest $request)
    {
        Curso::create($request->all());
        return redirect('curso')->with('success', 'Curso Asignado Exitosamente!');
    }

    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return view('curso.show', compact('curso'));
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $ncursos = Ncurso::all();
        $users = User::all();
        return view('curso.edit', compact('curso', 'ncursos', 'users'));
    }

    public function update(CursoRequest $request, $id)
    {
        $curso = Curso::findOrFail($id)->fill($request->all());

        if ($curso->isDirty()) {
            $curso->save();
            return redirect('curso')->with('success', 'Curso Actualizado!');
        }
        return redirect('curso')->with('error', 'No detectaron cambios');
    }

    public function destroy($id)
    {
        Curso::findOrFail($id)->delete();
        return redirect('curso')->with('success', 'Curso Eliminado!');
    }
}
