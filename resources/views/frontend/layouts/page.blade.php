@extends('layouts.master')

@section('body_class', 'layout-top-nav')

@section('body')
    <div class="wrapper">

        @include('frontend.includes.header')

        <div class="content-wrapper">
            <div class="container">
                <section class="content-header">
                    @yield('content_header')
                </section>
                <section class="content">
                    @yield('content')
                </section>
            </div>
        </div>

        @include('frontend.includes.footer')

    </div>
@endsection
