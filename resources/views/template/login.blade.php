<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="Description" content="HTML5 Bootstrap Admin Template" />
    <meta name="author" content="Spruko Technologies Private Limited" />
    <meta name="keywords"
        content="dashboard template,admin template,bootstrap dashboard,crypto dashboard,cryptocurrency dashboard,cryptocurrency website template,bitcoin template,bootstrap admin template,ico website template,admin dashboard template,admin panel template,bootstrap 4 admin template,dashboard html,html admin template,simple bootstrap template,template admin bootstrap 4,admin dashboard template bootstrap" />
    {{-- FAVICON --}}
    <link rel="icon" href="{{asset('/img/favicon.ico')}}" type="image/x-icon" />
    {{-- TITULO WEB --}}
    <title>{{config('app.name')}}</title>
    {{-- FONT AWESOME CSS --}}
    <link href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
    {{-- BOOTSTRAP CSS--}}
    <link href="{{asset('/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/dashboard-four.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/dashboard-four-dark.css')}}" rel="stylesheet" />

    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <livewire:styles>
</head>

<body class="main-body imagen">

    <div class="main-signin-wrapper">
        @yield('content')
    </div>

</body>

</html>