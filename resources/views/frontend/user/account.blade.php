@extends('frontend.layouts.page')

@section('content_header')
    <h1>My Account</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="center-block nav nav-tabs">
                    <li class="active">
                        <a href="#account_tab_1" data-toggle="tab">Profile</a>
                    </li>
                    <li>
                        <a href="#account_tab_2" data-toggle="tab">Update information</a>
                    </li>
                    <li>
                        <a href="#account_tab_3" data-toggle="tab">Change password</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane table-responsive no-padding active" id="account_tab_1">
                        @include('frontend.user.account.tabs.profile')
                    </div>
                    <div class="tab-pane" id="account_tab_2">
                        @include('frontend.user.account.tabs.edit')
                    </div>
                    <div class="tab-pane" id="account_tab_3">
                        @include('frontend.user.account.tabs.changePassword')
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
@endsection
