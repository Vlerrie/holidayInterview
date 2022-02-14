<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME', 'Holidays')}}</title>
    <!-- Fonts -->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <script src="{{asset('/js/app.js')}}" type="text/javascript"></script>
</head>
<body>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid col-md-8">
            <a class="navbar-brand" href="#">
                <img src="/img/collivery.net-logo.svg" alt="" width="200" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>
</body>
</html>
