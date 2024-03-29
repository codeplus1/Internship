<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="/dashboard"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Internship</span>
        </a>

    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
            <a href="/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Master
                    Entry</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('user.index') }}">Manage User</a></li>
            </ul>
        </li>

    </ul>
</aside>
