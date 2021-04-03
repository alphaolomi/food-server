<li class="side-menus {{ Request::is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class="fas fa-fire"></i><span>Dashboard</span>
    </a>
</li>
<li class="menu-header">Main</li>

<li class="side-menus {{ Request::is('food*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('food.index') }}"><i class="fas fa-building"></i><span>Food</span></a>
</li>

{{-- <li class="menu-header">Starter</li> --}}

<li class="side-menus {{ Request::is('leases*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('leases.index') }}"><i class="fas fa-cog"></i><span>Settings</span></a>
</li>
@hasanyrole( 'super-admin' )
{{-- settings here --}}
@endhasanyrole


