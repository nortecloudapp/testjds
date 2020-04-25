<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Curso;
use App\Ncurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EscritorioController extends Controller
{
    public function index()
    {
        $alu_comp = DB::table('cursos')
            ->join('ncursos', 'ncursos.id', '=', 'ncurso_id')
            ->select('ncursos.*', 'cursos.*')
            ->where('nombre_curso', '=', 'rem')
            ->count();

        $alu_lab = DB::table('cursos')
            ->join('ncursos', 'ncursos.id', '=', 'ncurso_id')
            ->select('ncursos.*', 'cursos.*')
            ->where('nombre_curso', '=', 'ipsum')
            ->count();

        $alu_mec = DB::table('cursos')
            ->join('ncursos', 'ncursos.id', '=', 'ncurso_id')
            ->select('ncursos.*', 'cursos.*')
            ->where('nombre_curso', '=', 'libero')
            ->count();

        $alu_elec = DB::table('cursos')
            ->join('ncursos', 'ncursos.id', '=', 'ncurso_id')
            ->select('ncursos.*', 'cursos.*')
            ->where('nombre_curso', '=', 'amet')
            ->count();

        // CONTAR DOCENTES
        $nro_docentes = User::whereHas(
            'roles',
            function ($q) {
                $q->where('nombre_rol', 'docente');
            }
        )->count();

        // CONTAR ALUMNOS
        $nro_alumnos = User::whereHas(
            'roles',
            function ($q) {
                $q->where('nombre_rol', 'alumno');
            }
        )->count();

        $nro_cursos = Ncurso::all()->count();

        // LISTA DOCENTES
        $lista_docentes = User::whereHas(
            'roles',
            function ($q) {
                $q->where('nombre_rol', 'docente');
            }
        )->get();


        // CHART ALUMNOS POR PROGRAMA

        $chartAlumnos = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 420])
            ->labels(['Computación', 'Laboratório', 'Mecánica', 'Electrotecnia'])
            ->datasets([
                [
                    'backgroundColor' => ['#0c9a30', '#19c3f4', '#3a3a3b', '#f4a419'],
                    'hoverBackgroundColor' => ['#05631d', '#0f83a4', '#68686a', '#b07816'],
                    'data' => [$alu_comp, $alu_lab, $alu_mec, $alu_elec]
                ]
            ])
            ->options([]);


        $chartNotas = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
            ->datasets([
                [
                    "label" => "My First dataset",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                ],
                [
                    "label" => "My Second dataset",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [12, 33, 44, 44, 55, 23, 40],
                ]
            ])
            ->options([]);

        $clientIP = \Request::ip();
        return view('escritorio.index', compact('nro_docentes', 'nro_alumnos', 'nro_cursos', 'lista_docentes', 'chartAlumnos', 'chartNotas', 'clientIP'));
    }
}
