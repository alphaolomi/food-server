<li class="sidebar-header">
    Main
</li>
<li class="sidebar-item">
    <a href="#dashboards" data-toggle="collapse" class="sidebar-link collapsed">
        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
    </a>
    <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
        <li class="sidebar-item"><a class="sidebar-link" href="dashboard-default.html">Default</a></li>
    </ul>
</li>
<li class="sidebar-item active">
    <a href="#pages" data-toggle="collapse" class="sidebar-link">
        <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Pages</span>
    </a>
    <ul id="pages" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
        <li class="sidebar-item"><a class="sidebar-link" href="{{route('profile.setting')}}">Profile</a></li>

    </ul>
</li>

<li class="nav-item {{ Request::is('foods*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('foods.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Foods</span>
    </a>
</li>
