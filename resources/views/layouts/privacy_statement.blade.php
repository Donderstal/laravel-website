<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" media="all" rel="stylesheet" type="text/css">
        <!-- Fontawesome for (temp) icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        @yield('head_extra')

    </head>
    <body class="pdf-body">
        <div class="pdf-outer-div">
            <div class="pdf-inner-div"> 
                <iframe src="{{URL::to('/')}}/docs/Privacy_en_Cookie_Statement_GAM.pdf" width="100%" height="100%"></iframe>
            </div>
        </div>
    </body>
</html>


