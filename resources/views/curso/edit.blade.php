@extends('template.main')

@section('content')
<form action="{{ route('curso.update',$curso->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5>ASIGNAR CURSO</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12 form-group">
                    <label for="">Nombre de curso:</label>
                    <select name="ncurso_id" class="form-control">
                        @foreach ($ncursos as $ncurso)
                        <option {{ $ncurso->id == $curso->ncurso_id ? 'selected=""' : '' }} value="{{$ncurso->id}}">
                            {{$ncurso->nombre_curso}}</option>
                        @endforeach
                    </select>
                    <span class="tx-danger tx-bold">{{ $errors->first('ncurso_id') }}</span>
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="">Usuario:</label>
                    <select name="user_id" class="form-control">
                        @foreach ($users as $user)
                        <option {{ $user->id == $curso->user_id ? 'selected=""' : '' }} value="{{$user->id}}">
                            {{$user->nombres.' '.$user->apellidos}}</option>
                        @endforeach
                    </select>
                    <span class="tx-danger tx-bold">{{ $errors->first('user_id') }}</span>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <button class="btn btn-dark btn-sm" type="submit">
                            <i class="fas fa-check">
                            </i>
                            Editar
                        </button>
                        <a class="btn btn-danger btn-sm" href="{{ route('curso.index') }}">
                            <i class="fas fa-times">
                            </i>
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection