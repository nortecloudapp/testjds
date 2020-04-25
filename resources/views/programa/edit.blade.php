@extends('template.main')

@section('content')
<form action="{{ route('programa.update',$programa->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5>EDITAR PROGRAMA</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-12 form-group">
                    <label for="">Nombre Programa:</label>
                    <input type="text" class="form-control" name="nombre_programa"
                        value="{{$programa->nombre_programa}}">
                    <span class="tx-danger">{{ $errors->first('nombre_programa') }}</span>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <button class="btn btn-dark btn-sm" type="submit">
                            <i class="fas fa-check">
                            </i>
                            Editar
                        </button>
                        <a class="btn btn-danger btn-sm" href="{{ route('programa.index') }}">
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