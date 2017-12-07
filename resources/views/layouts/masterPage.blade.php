@extends('layouts.master')

@push('js')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endpush

@section('body')
    <div class="wrapper">

        @yield('header')

        @yield('sidebar')

        <!-- Full Width Column -->
        <div class="content-wrapper">
            @include('includes.partials.logged-in-as')
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('content_header')
                    {!! Breadcrumbs::render() !!}
                </section>
                <!-- Main content -->
                <section class="content">
                    @include('flash::message')
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
