@extends('template.main')

@section('content')

<form action="{{ route('material.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5>REGISTAR MATERIAL</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-12 form-group">
                    <label for="">Nombre de curso:</label>
                    <select name="ncurso_id" class="form-control">
                        @foreach ($ncursos as $ncurso)
                        <option value="{{$ncurso->id}}">{{$ncurso->nombre_curso}}</option>
                        @endforeach
                    </select>
                    <span class="tx-danger">{{ $errors->first('ncurso_id') }}</span>
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="">Tag:</label>
                    <input type="text" class="form-control" name="tag" value="{{old('tag')}}">
                    <span class="tx-danger">{{ $errors->first('tag') }}</span>
                </div>
                <div class="col-md-5 col-12 form-group">
                    <label for="">Url de material:</label>
                    <input type="url" class="form-control" name="url" value="{{old('url')}}">
                    <span class="tx-danger">{{ $errors->first('url') }}</span>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <button class="btn btn-dark btn-sm" type="submit">
                            <i class="fas fa-check">
                            </i>
                            Registrar
                        </button>
                        <a class="btn btn-danger btn-sm" href="{{ route('material.index') }}">
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