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

