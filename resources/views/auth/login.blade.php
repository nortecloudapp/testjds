@extends('template.login')

@section('content')
<div class="row text-center pl-0 pr-0 ml-0 mr-0">
    <div class="col-lg-3 d-block mx-auto">
        <div class="card">
            <div class="card-body">
                <img src="{{asset('/img/logo.png')}}" class="mb-3" alt="Logo">
                <h4>JDS - VIRTUAL</h4>
                <form action="{{ route('login') }}" method="post" class="text-left mt-3">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Ingresar su Correo" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Ingresar su Contraseña">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button class="btn btn-main-primary btn-block">Iniciar Sesión</button>
                    <div class="main-signin-footer mg-t-5 tx-center">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            ¿Olvidó su contraseña?
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection