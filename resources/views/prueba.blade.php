<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 bg-info">
                <ul>
                    @foreach ($users as $user)
                    <li>
                        <strong>{{$user->nombres}}</strong>
                        @foreach ($user->roles as $role)
                        <strong>{{$role->nombre_rol}}</strong>
                        @endforeach
                    </li>
                    @if ($user->hasRole('admin'))
                    <a href="{{route('remove.Admin',$user->id)}}" class="btn btn-primary">Remove Admin</a>
                    @else
                    <a href="{{route('give.Admin',$user->id)}}" class="btn btn-primary">Give Admin</a>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>