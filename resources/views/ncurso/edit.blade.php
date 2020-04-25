@extends('template.main')

@section('content')
<form action="{{ route('ncurso.update',$ncurso->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5>EDITAR CURSO</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-12 form-group">
                    <label for="">Nombre de curso:</label>
                    <input type="text" class="form-control" name="nombre_curso" value="{{$ncurso->nombre_curso}}">
                    <span class="tx-danger">{{ $errors->first('nombre_curso') }}</span>
                </div>
                <div class="col-md-4 col-12 form-group">
                    <label for="">Nombre de ciclo:</label>
                    <select name="ciclo_id" class="form-control">
                        @foreach ($ciclos as $ciclo)
                        <option {{ $ciclo->id == $ncurso->ciclo_id ? 'selected=""' : '' }} value="{{$ciclo->id}}">
                            {{$ciclo->nro_ciclo}}</option>
                        @endforeach
                    </select>
                    <span class="tx-danger">{{ $errors->first('ciclo_id') }}</span>
                </div>
                <div class="col-md-4 col-12 form-group">
                    <label for="">Programa:</label>
                    <select name="programa_id" class="form-control">
                        @foreach ($programas as $programa)
                        <option {{ $programa->id == $ncurso->programa_id ? 'selected=""' : '' }}
                            value="{{$programa->id}}">{{$programa->nombre_programa}}</option>
                        @endforeach
                    </select>
                    <span class="tx-danger">{{ $errors->first('programa_id') }}</span>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <button class="btn btn-dark btn-sm" type="submit">
                            <i class="fas fa-check">
                            </i>
                            Editar
                        </button>
                        <a class="btn btn-danger btn-sm" href="{{ route('ncurso.index') }}">
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