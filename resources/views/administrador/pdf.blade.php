<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="{{asset('/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <title>Reporte Uusuarios</title>
</head>

<body>
    <div class="table-responsive-sm text-center">
        <h5 class="bg-indigo tx-center tx-md-26 tx-white pd-t-10 pd-b-10">TABLA USUARIOS {{ config('app.name') }}</h5>
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">NOMBRES Y APELLIDOS</th>
                    <th scope="col">DNI</th>
                    <th scope="col">NACIMIENTO</th>
                    <th scope="col">CELULAR</th>
                    <th scope="col">CORREO</th>
                    <th scope="col">REGISTRADO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombres.' '.$usuario->apellidos }}</td>
                    <td>{{ $usuario->dni }}</td>
                    <td>{{ $usuario->nacimiento }}</td>
                    <td>{{ $usuario->celular }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ date('d-m-Y', strtotime($usuario->created_at)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>