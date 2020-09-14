<li class="nav-item {{ Request::is('loans*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('loans.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Loans</span>
    </a>
</li>
