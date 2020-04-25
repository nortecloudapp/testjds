<?php

namespace App\Http\Controllers;

use App\Nota;
use App\User;
use App\Ncurso;
use Illuminate\Http\Request;
use App\Http\Requests\NotaRequest;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::all();
        return view('nota.index', compact('notas'));
    }

    public function create()
    {
        $ncursos = Ncurso::all();
        $users = User::all();
        return view('nota.create', compact('ncursos', 'users'));
    }

    public function store(NotaRequest $request)
    {
        Nota::create($request->all());
        return redirect('nota')->with('success', 'Nota Registrada!');
    }

    public function show($id)
    {
        $nota = Nota::findOrFail($id);
        return view('nota.show', compact('nota'));
    }

    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        $ncursos = Ncurso::all();
        $users = User::all();
        return view('nota.edit', compact('nota', 'ncursos', 'users'));
    }

    public function update(NotaRequest $request, $id)
    {
        $nota = Nota::findOrFail($id)->fill($request->all());

        if ($nota->isDirty()) {
            $nota->save();
            return redirect('nota')->with('success', 'Nota Actualizada!');
        }
        return redirect('nota')->with('error', 'No detectaron cambios');
    }

    public function destroy($id)
    {
        Nota::findOrFail($id)->delete();
        return redirect('nota')->with('success', 'Nota Eliminada!');
    }
}
