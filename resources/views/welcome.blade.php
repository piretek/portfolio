<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title.__(' - my portfolio') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <!-- Sorry for Bootstrap, but I don't like it and I decided to just learn it a little bit as it was in the Laravel package :D -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script src="https://kit.fontawesome.com/263a4f6498.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/scrollreveal"></script>
        <script>
            let cookie_consent = '{{ __('This site uses cookies. By continuing you agree to use them.') }}';
            let cookie_agree = '{{ __('Ok, close this.') }}';
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="inner-wrapper">
                <header>
                    <div class="header">
                        <div class="avatar" style="background-image: url('/images/me.jpg')"></div>
                        <div class="title">{{ $title }}</div>
                        <div class="sub-title">{{ $subtitle }}</div>
                    </div>
                </header>
                <main>
                    <div class="content">
                        <div class="timeline">

                            @foreach($websites as $website)
                                <div class="timeline__element">
                                    <div class="timeline__element--image">
                                        <div class="screenshot" style="background-image: url( {{ $website->screenshot(true) }});"></div>
                                    </div>

                                    <div class="timeline__element--dot"></div>

                                    @if(!$loop->last)
                                        <div class="timeline__element--connector"></div>
                                    @endif

                                    <div class="timeline__element--info">
                                        <h1>{{ $website->title }}</h1>
                                        <p>{{ $website->description() }}</p>
                                        <a href="{{ $website->url }}" target="_blank"><button class='btn btn-light'>{{ __('Open website') }}</button></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </main>
            <footer>
                <div class="footer">
                    <div class="columns">
                        <div class="column">
                            <h1 id="contact">{{ __('Contact with me now!') }}</h1>

                            @if( session('status') )
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif


                            {{-- @if (isset($errors) && count($errors))

                                There were {{count($errors->all())}} Error(s)
                                            <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }} </li>
                                        @endforeach
                                    </ul>

                            @endif --}}

                            <form method="POST" action="/contact">
                                @csrf
                                <input type="hidden" name="_grecaptcha" value="" />

                                <div class="form-group">
                                    <label for="name">{{ sprintf('%s (%s)', __('Your name'), __('required')) }}</label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Your name') }}" value="{{ old('name') }}" />

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ sprintf('%s (%s)',__('Your e-mail'), __('required')) }}</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Your e-mail') }}" value="{{ old('name') }}" />

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="details">{{ sprintf('%s (%s)',__('Tell me some details'), __('required')) }}</label>
                                    <textarea name="details" id="details" class="form-control @error('details') is-invalid @enderror" placeholder="{{ __('Tell me some details') }}">{{ old('name') }}</textarea>

                                    @error('details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input @error('agreement') is-invalid @enderror" id="agreement" name="agreement" value="yes" />
                                    <label for="agreement" class="form-check-label c-agreement">{{ sprintf( '%s (%s)', __('I agree to process my personal data in acknowledgement with GDPR law in order to start conversation via my personal email account. Giving these information is voluntary but it\'s necessary to process the request. I know that I can access these information by contacting with administrator of this website.'), __('required')) }}</label>

                                    @error('agreement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <p class="recaptcha-info">
                                        {{ __('This site is protected by reCAPTCHA and the Google') }}<br>
                                        <a href="https://policies.google.com/privacy">{{ __('Privacy Policy') }}</a> | <a href="https://policies.google.com/terms">{{ __('Terms of Service') }}</a>.
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Send') }}</button>
                            </form>
                        </div>
                        <div class="column align-right">
                            <div class="avatar" style="background-image: url('/images/me.jpg')"></div>
                            <h1>{{ $title }}</h1>

                            <div class="contact__icons">
                                <a style="display: inline-block;" title="Messenger" href="https://m.me/piotrek.czarnecki.940" target="_blank">
                                    <i class="fab fa-facebook-messenger fa-2x"></i>
                                </a>
                                <a style="display: inline-block;" title="Instagram" href="https://www.instagram.com/piretek/" target="_blank">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </a>
                                <a style="display: inline-block;" title="Github" href="https://github.com/piretek" target="_blank">
                                    <i class="fab fa-github fa-2x"></i>
                                </a>
                                <a style="display: inline-block;" title="Snapchat" href="https://www.snapchat.com/add/piretek" target="_blank">
                                    <i class="fab fa-snapchat fa-2x"></i>
                                </a>
                                <a style="display: inline-block;" title="Pinterest" href="https://pl.pinterest.com/piretek/" target="_blank">
                                    <i class="fab fa-pinterest fa-2x"></i>
                                </a>
                            </div>
                            <div class="copyright">
                                <p>{{ __("Copyright © 2020 by me if you haven't already noticed.") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        {!! htmlScriptTagJsApi([
            'action' => 'contact',
            'custom_validation' => 'recaptcha'
        ]) !!}
    </body>
</html>
