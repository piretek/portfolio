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
            <header>
                <div class="header">
                    <div class="avatar" style="background-image: url('/images/me.jpg')"></div>
                    <div class="title">{{ $title }}</div>
                    <div class="sub-title">{{ $subtitle }}</div>
                </div>
            <header>
            <main>
                <div class="content">
                    <div class="timeline">

                        @foreach($websites as $website)
                            <div class="timeline__element">
                                <div class="timeline__element--image">
                                    <div class="screenshot" style="background-image: url(/storage/{{ $website->screenshot }});"></div>
                                </div>

                                <div class="timeline__element--dot"></div>

                                @if(!$loop->last)
                                    <div class="timeline__element--connector"></div>
                                @endif

                                <div class="timeline__element--info">
                                    <h1>{{ $website->title }}</h1>
                                    <p>{{ $website->desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
            <footer>
                <div class="footer">

                </div>
            </footer>
        </div>
    </body>
</html>
