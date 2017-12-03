@extends('frontend.layouts.page')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <div class="widget-user-image">
                        <img class="img-circle" src="{{ Gravatar::src($logged_in_user->email) }}" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">{{ $logged_in_user->name }}</h3>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="{{ route('frontend.user.account') }}">Account</a></li>
                        @if($logged_in_user->isAdmin())
                            <li><a href="{{ route('admin.dashboard') }}">Admin dashboard</a></li>
                        @endif
                        @if($logged_in_user->employee)
                            <li><a href="{{ route('frontend.employee.show', $logged_in_user->employee->id) }}">Employee profile</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        <!-- /.col -->
    </div>
@endsection
