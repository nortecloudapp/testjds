@extends('template.errors')

@section('content')

<div class="page h-100">
    <div class="main-error-wrapper">
        <h1>403</h1>
        <h2>Error</h2>
        <h6>Acceso no autorizado!</h6>
        <a class="btn btn-info" href="{{url('/')}}">Volver Inicio</a>
    </div>
</div>

@endsection