@extends('template.login')

@section('content')
<div class="row text-center pl-0 pr-0 ml-0 mr-0">
    <div class="col-lg-3 d-block mx-auto">
        <div class="card">
            <div class="card-body">
                <img src="{{asset('/img/logo.png')}}" class="mb-3" alt="Logo">
                <h4>JDS - VIRTUAL</h4>
                @if (session('status'))
                <div class="alert alert-block bg-success text-white" role="alert">
                    <strong>{{ session('status') }}</strong>
                </div>
                @endif
                <form action="{{ route('password.email') }}" method="post" class="text-left mt-3">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    </div><button class="btn btn-main-primary btn-block">Resetear Contraseña</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection