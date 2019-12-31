<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('Piotr Czarnecki - my portfolio') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="header">
                <div class="avatar" style="background-image: url('/images/me.jpg')"></div>
                <div class="title">Piotr Czarnecki</div>
                <div class="sub-title">Nie wiem... :)</div>
            </div>
            <div class="content">
                <div></div>
            </div>
        </div>
    </body>
</html>
