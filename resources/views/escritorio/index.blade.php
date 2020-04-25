@extends('template.main')

@section('content')
{{-- <ul>
    <li>LISTA DOCENTES</li>
    @foreach ($lista_docentes as $item)
    <li>{{$item->nombres}}</li>
@endforeach
</ul> --}}

<div class="row">
    <div class="col-lg-7">
        <h4 class="tx-primary">Bienvenido: {{Auth::user()->nombres .' ' .Auth::user()->apellidos}}</h4>
    </div>
    <div class="col-lg-5">
        <h4 class="tx-dark tx-right">{{ date('d-m-Y') }} / IP: {{$clientIP}}</h4>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-4">
        <div class="card p-4 mg-b-20 bg-info tx-white">
            <label class="text-uppercase font-weight-bold tx-13">Docentes</label>
            <h2>{{$nro_docentes}}</h2>
            <p class="mb-0 tx-13">Informe breve de la cantidad de Docentes registrados.</p>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card p-4 mg-b-20 bg-primary tx-white">
            <label class="text-uppercase font-weight-bold tx-13">Alumnos</label>
            <h2>{{$nro_alumnos}}</h2>
            <p class="mb-0 tx-13">Informe breve de la cantidad de Alumnos registrados.</p>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card p-4 mg-b-20 bg-orange tx-white">
            <label class="text-uppercase font-weight-bold tx-13">Cursos</label>
            <h2>{{$nro_cursos}}</h2>
            <p class="mb-0 tx-13">Informe breve de la cantidad de Cursos registrados.</p>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-4">
        {!! $chartAlumnos->render() !!}
    </div>
    <div class="col-lg-8">
        {!! $chartNotas->render() !!}
    </div>
</div>
@endsection
@section('myscripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
@endsection