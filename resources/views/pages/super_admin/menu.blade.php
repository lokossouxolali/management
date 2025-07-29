{{--Gérer les paramètres--}}
<li class="nav-item">
    <a href="{{ route('settings') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['settings',]) ? 'active' : '' }}"><i class="icon-gear"></i> <span>Paramètres</span></a>
</li>

{{--Codes PIN--}}
<li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['pins.create', 'pins.index']) ? 'nav-item-expanded nav-item-open' : '' }} ">
    <a href="#" class="nav-link"><i class="icon-lock2"></i> <span> Codes PIN</span></a>

    <ul class="nav nav-group-sub" data-submenu-title="Gérer les codes PIN">
        {{--Générer des codes PIN--}}
            <li class="nav-item">
                <a href="{{ route('pins.create') }}"
                   class="nav-link {{ (Route::is('pins.create')) ? 'active' : '' }}">Générer des codes PIN</a>
            </li>

        {{--    Codes PIN valides/invalides  --}}
        <li class="nav-item">
            <a href="{{ route('pins.index') }}"
               class="nav-link {{ (Route::is('pins.index')) ? 'active' : '' }}">Voir les codes PIN</a>
        </li>
    </ul>
</li>