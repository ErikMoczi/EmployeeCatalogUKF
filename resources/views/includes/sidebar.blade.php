<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        @include('includes.sidebar.user')

        {{-- @include('includes.sidebar.search') --}}

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            @yield('sidebar-menu')
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
