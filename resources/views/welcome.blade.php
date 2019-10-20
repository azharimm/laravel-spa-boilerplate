<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.Laravel = {!!
                json_encode([
                    'csrfToken'=>csrf_token(),
                ])
            !!};
        </script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script type="text/javascript" src="{{mix('js/app.js')}}"></script>
    </body>
</html>
