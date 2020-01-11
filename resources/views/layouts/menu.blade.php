<li class="sidebar-header">
    Main
</li>
<li class="sidebar-item {{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{route('home')}}" class="sidebar-link">
        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
    </a>
</li>
<li class="sidebar-item {{ Request::is('foods*') ? 'active' : '' }}">
    <a href="#food" data-toggle="collapse" class="sidebar-link">
        <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Foods</span>
    </a>
    <ul id="food" class="sidebar-dropdown list-unstyled {{ Request::is('foods*') ? 'collapsed' : 'collapse' }} {{ Request::is('foods*') ? 'show' : '' }}" data-parent="#sidebar">
        <li class="sidebar-item"><a class="sidebar-link {{ Request::is('foods.index') ? 'active' : '' }}" href="{{route('foods.index')}}">Index</a></li>
        <li class="sidebar-item"><a class="sidebar-link {{ Request::is('foods.create') ? 'active' : '' }}" href="{{route('foods.create')}}">Create</a></li>
    </ul>
</li>
