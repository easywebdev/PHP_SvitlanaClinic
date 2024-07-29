
<ul class="nav">
    <li class="nav__item"><a class="nav__link @if(Route::getCurrentRoute()->getName() == 'index') nav__link_active @endif" href="{{ route('index') }}">Accueil</a></li>
    <li class="nav__item"><a class="nav__link @if(Route::getCurrentRoute()->getName() == 'services') nav__link_active @endif" href="{{ route('services') }}">Services</a></li>
    <li class="nav__item"><a class="nav__link @if(Route::getCurrentRoute()->getName() == 'contacts') nav__link_active @endif" href="{{ route('contacts') }}">Contactes</a></li>
</ul>