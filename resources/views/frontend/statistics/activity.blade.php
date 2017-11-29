@extends('frontend.layouts.page')

@section('content_header')
    <h1>Activity statistics</h1>
@endsection

@push('css')
    {!! Charts::styles() !!}
@endpush

@push('js')
    {!! Charts::scripts() !!}
    {!! $countryChart->script() !!}
    {!! $typeChart->script() !!}
    {!! $categoryChart->script() !!}
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Country</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Type</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Category</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        {!! $countryChart->html() !!}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        {!! $typeChart->html() !!}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        {!! $categoryChart->html() !!}
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
