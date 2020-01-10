<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if(request()->is('portfolio')) active @endif" href="portfolio">{{ __('Websites') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->is('ust-portfolio')) active @endif" href="ust-portfolio">{{ __('Settings') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->is('users')) active @endif" href="uzytkownicy">{{ __('Users') }}</a>
    </li>
</ul>
