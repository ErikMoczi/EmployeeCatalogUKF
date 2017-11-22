@extends('includes.header')

@section('header-logo')
    @include('includes.header.logo')
@endsection

@section('header-navrbar-toggle')
    @include('includes.header.toggle')
@endsection

@section('header-navbar-header')
    <a href="{{ route('admin.dashboard') }}" class="navbar-brand">Home</a>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
    </button>
@endsection
