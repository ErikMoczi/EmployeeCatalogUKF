@if (Route::has('auth.login'))
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            @guest
                <li><a href="{{ route('auth.login') }}">Login</a></li>
            @else
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ $logged_in_user->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ Gravatar::src($logged_in_user->email) }}" class="img-circle" alt="User Image">
                            <p>
                                {{ $logged_in_user->name }}
                                <small>Member since {{ $logged_in_user->getAccountCreateMonthYear() }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                @if($logged_in_user->isAdmin())
                                    <div class="col-xs-4 text-center">
                                        <a href="{{ route('admin.dashboard') }}">Admin</a>
                                    </div>
                                @endif
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('frontend.user.dashboard') }}" class="btn btn-default btn-flat">Dashboard</a>
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('frontend.user.account') }}" class="btn btn-default btn-flat">Account</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('auth.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
    <!-- /.navbar-custom-menu -->
@endif
