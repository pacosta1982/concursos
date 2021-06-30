<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
	@if(View::exists('admin.layout.logo'))
        @include('admin.layout.logo')
	@endif
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a role="button" class="dropdown-toggle nav-link">
                <span>
                    <span class="avatar-initials">{{ mb_substr(Auth::user()->name, 0, 1) }}</span>
                    <span class="hidden-md-down">{{ Auth::check() ? Auth::user()->name : 'Anonimo' }}</span>
                </span>
                <span class="caret"></span>
            </a>
            @if(View::exists('admin.layout.profile-dropdown'))
                @include('admin.layout.profileusersys-dropdown')
            @endif
        </li>
    </ul>
</header>
