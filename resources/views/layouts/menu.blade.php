<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-top" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu-top">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @role('admin')
                <li class="nav-item">
                    <a class="nav-link {{ route_active('admin-users') }}" href="{{ route('admin-users') }}">
                        <i class="fa fa-users"></i>
                        {{ __('Users') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ route_active('admin-settings') }}" href="{{ route('admin-settings') }}">
                        <i class="fa fa-cogs"></i>
                        {{ __('Settings') }}
                    </a>
                </li>
                @endrole

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ route_active('login') }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ route_active('register') }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="profile-dropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile-dropdown">
                            <a class="dropdown-item {{ route_active('profile') }}" href="{{ route('profile') }}">
                                <i class="fa fa-cog"></i>
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="fa fa-sign-out-alt"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>