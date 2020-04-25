<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{

    public function index()
    {
        // $users = User::with('roles')->get();
        // return view('prueba', compact('users'));
        return view('administrador.index');
    }

    public function docentes()
    {
        return view('administrador.docente');
    }

    public function alumnos()
    {
        return view('administrador.alumno');
    }

    public function pdfusuarios()
    {
        $hora = Carbon::now()->format('d/m/Y-H:i:s');
        $usuarios = User::all();
        $pdf  = PDF::loadView('administrador.pdf', compact('hora', 'usuarios'))->setPaper('a4', 'landscape');
        return $pdf->stream('usuarios' . '-' . $hora . '.pdf');
        // return $pdf->download();
    }

    public function giveAdmin($id)
    {
        $user = User::findOrFail($id);
        $adminRole = Role::where('nombre_rol', 'admin')->firstOrFail();
        $user->roles()->sync($adminRole);
        return redirect('probando');
    }

    public function removeAdmin($id)
    {
        $user = User::findOrFail($id);
        $adminRole = Role::where('nombre_rol', 'admin')->firstOrFail();
        $user->roles()->detach($adminRole->id);
        return redirect('probando');
    }
}
