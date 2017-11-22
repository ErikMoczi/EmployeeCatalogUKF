@extends('layouts.master')

@section('body')
    <div class="wrapper">

        @yield('header')

        @yield('sidebar')

        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('content_header')
                </section>
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->

        @include('includes.footer')

    </div>
    <!-- ./wrapper -->
@endsection
