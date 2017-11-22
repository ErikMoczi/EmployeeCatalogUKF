@extends('includes.header')

@section('header-navbar-header')
    <a href="{{ route('frontend.home') }}" class="navbar-brand"><b>UKF</b> katalóg zamestnancov</a>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
    </button>
@endsection

@section('header-navbar-container')
    @parent
    @include('frontend.includes.headerMenu')
@endsection
