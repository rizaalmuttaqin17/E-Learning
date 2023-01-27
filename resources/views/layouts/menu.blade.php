<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

<li class="{{ Request::is('ujians*') ? 'active' : '' }}">
    <a href="{{ route('ujians.index') }}"><i class="fas fa-edit"></i><span>@lang('models/ujians.plural')</span></a>
</li>
@role('Admin')
<li class="dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i><span>Soal</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('soals*') ? 'active' : '' }}">
            <a href="{{ route('soals.index') }}"><span>@lang('models/soals.plural')</span></a>
        </li>
        <li class="{{ Request::is('tipeSoals*') ? 'active' : '' }}">
            <a href="{{ route('tipeSoals.index') }}"><span>@lang('models/tipeSoals.plural')</span></a>
        </li>
        <li class="{{ Request::is('pilihans*') ? 'active' : '' }}">
            <a href="{{ route('pilihans.index') }}"><span>@lang('models/pilihans.plural')</span></a>
        </li>
        <li class="{{ Request::is('jawabans*') ? 'active' : '' }}">
            <a href="{{ route('jawabans.index') }}"><span>@lang('models/jawabans.plural')</span></a>
        </li>
        <li class="{{ Request::is('kategoris*') ? 'active' : '' }}">
            <a href="{{ route('kategoris.index') }}"><span>@lang('models/kategoris.plural')</span></a>
        </li>
    </ul>
</li>


<li class="dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i><span>Settings</span></a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('mataKuliahs*') ? 'active' : '' }}">
            <a href="{{ route('mataKuliahs.index') }}"><span>@lang('models/mataKuliahs.plural')</span></a>
        </li>
        <li class="{{ Request::is('fakultas*') ? 'active' : '' }}">
            <a href="{{ route('fakultas.index') }}"><span>@lang('models/fakultas.plural')</span></a>
        </li>
        <li class="{{ Request::is('programStudis*') ? 'active' : '' }}">
            <a href="{{ route('programStudis.index') }}"><span>@lang('models/programStudis.plural')</span></a>
        </li>
        <li class="side-menus {{ Request::is('permissions*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('permissions.index') }}"><span>@lang('models/permissions.plural')</span></a>
        </li>
        <li class="side-menus {{ Request::is('roles*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('roles.index') }}"><span>@lang('models/roles.plural')</span></a>
        </li>
        <li class="side-menus {{ Request::is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}"><span>@lang('models/users.plural')</span></a>
        </li>
    </ul>
</li>
@endrole