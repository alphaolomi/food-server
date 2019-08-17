<li class="nav-item {{ Request::is('foods*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('foods.index') !!}"><i class="nav-icon icon-cursor"></i><span>Foods</span></a>
</li>
<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('users.index') !!}"><i class="nav-icon icon-cursor"></i><span>Users</span></a>
</li>
