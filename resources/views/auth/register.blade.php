@extends('template.main')

@section('content')
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="nombres" class="col-md-4 col-form-label text-md-right">Nombres</label>

        <div class="col-md-6">
            <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres"
                value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>

            @error('nombres')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="Apellidos" class="col-md-4 col-form-label text-md-right">Apellidos</label>

        <div class="col-md-6">
            <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror"
                name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

            @error('apellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="Dni" class="col-md-4 col-form-label text-md-right">Dni</label>

        <div class="col-md-6">
            <input id="dni" type="number" class="form-control @error('dni') is-invalid @enderror" name="dni"
                value="{{ old('dni') }}" required autocomplete="dni" autofocus>

            @error('dni')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="nacimiento" class="col-md-4 col-form-label text-md-right">nacimiento</label>

        <div class="col-md-6">
            <input id="nacimiento" type="date" class="form-control @error('nacimiento') is-invalid @enderror"
                name="nacimiento" value="{{ old('nacimiento') }}" required autocomplete="nacimiento" autofocus>

            @error('nacimiento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="Celular" class="col-md-4 col-form-label text-md-right">Celular</label>

        <div class="col-md-6">
            <input id="celular" type="number" class="form-control @error('celular') is-invalid @enderror" name="celular"
                value="{{ old('celular') }}" required autocomplete="celular" autofocus>

            @error('celular')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="Avatar" class="col-md-4 col-form-label text-md-right">Avatar</label>

        <div class="col-md-6">
            <input type="file" name="avatar" class="form-control-file" id="avatarimage">

            @error('avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
@endsection