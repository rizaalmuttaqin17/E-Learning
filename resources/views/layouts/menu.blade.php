<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('models/users.plural')</span></a>
</li>

<li class="{{ Request::is('fakultas*') ? 'active' : '' }}">
    <a href="{{ route('fakultas.index') }}"><i class="fa fa-edit"></i><span>@lang('models/fakultas.plural')</span></a>
</li>

<li class="{{ Request::is('programStudis*') ? 'active' : '' }}">
    <a href="{{ route('programStudis.index') }}"><i class="fa fa-edit"></i><span>@lang('models/programStudis.plural')</span></a>
</li>

<li class="{{ Request::is('tipeSoals*') ? 'active' : '' }}">
    <a href="{{ route('tipeSoals.index') }}"><i class="fa fa-edit"></i><span>@lang('models/tipeSoals.plural')</span></a>
</li>

<li class="{{ Request::is('kategoris*') ? 'active' : '' }}">
    <a href="{{ route('kategoris.index') }}"><i class="fa fa-edit"></i><span>@lang('models/kategoris.plural')</span></a>
</li>

<li class="{{ Request::is('mataKuliahs*') ? 'active' : '' }}">
    <a href="{{ route('mataKuliahs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/mataKuliahs.plural')</span></a>
</li>

<li class="{{ Request::is('ujians*') ? 'active' : '' }}">
    <a href="{{ route('ujians.index') }}"><i class="fa fa-edit"></i><span>@lang('models/ujians.plural')</span></a>
</li>

<li class="{{ Request::is('soals*') ? 'active' : '' }}">
    <a href="{{ route('soals.index') }}"><i class="fa fa-edit"></i><span>@lang('models/soals.plural')</span></a>
</li>

<li class="{{ Request::is('pilihans*') ? 'active' : '' }}">
    <a href="{{ route('pilihans.index') }}"><i class="fa fa-edit"></i><span>@lang('models/pilihans.plural')</span></a>
</li>

<li class="{{ Request::is('soals*') ? 'active' : '' }}">
    <a href="{{ route('soals.index') }}"><i class="fa fa-edit"></i><span>@lang('models/soals.plural')</span></a>
</li>

<li class="{{ Request::is('ujians*') ? 'active' : '' }}">
    <a href="{{ route('ujians.index') }}"><i class="fa fa-edit"></i><span>@lang('models/ujians.plural')</span></a>
</li>

<li class="{{ Request::is('mataKuliahs*') ? 'active' : '' }}">
    <a href="{{ route('mataKuliahs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/mataKuliahs.plural')</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/roles.plural')</span></a>
</li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>@lang('models/permissions.plural')</span></a>
</li>

<li class="{{ Request::is('jawabans*') ? 'active' : '' }}">
    <a href="{{ route('jawabans.index') }}"><i class="fa fa-edit"></i><span>@lang('models/jawabans.plural')</span></a>
</li>

