<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if(request()->is('portfolio')) active @endif" href="portfolio">Strony</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->is('settings')) active @endif" href="ust-portfolio">Ust. portfolio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->is('users')) active @endif" href="uzytkownicy">Użytkownicy</a>
    </li>
</ul>
