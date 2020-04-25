@extends('template.errors')

@section('content')

<div class="page h-100">
    <div class="main-error-wrapper">
        <h1>404</h1>
        <h2>Error</h2>
        <h6>Pagína no encontrada!</h6>
        <a class="btn btn-info" href="{{url('/')}}">Volver Inicio</a>
    </div>
</div>

@endsection