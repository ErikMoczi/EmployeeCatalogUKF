<header class="main-header">
    @yield('header-logo')

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

        @yield('header-navrbar-toggle')

        <div class="container">

            <div class="navbar-header">
                @yield('header-navbar-header')
            </div>

            @section('header-navbar-container')
                @include('includes.header.user')
            @stop
            @yield('header-navbar-container')

        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
