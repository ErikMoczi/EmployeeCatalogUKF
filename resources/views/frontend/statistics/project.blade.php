@extends('frontend.layouts.page')

@section('content_header')
    <h1>Project statistics</h1>
@endsection

@push('css')
    {!! Charts::styles() !!}
@endpush

@push('js')
    {!! Charts::scripts() !!}
    {!! $projectAverageChart->script() !!}
    {!! $projectStartingChart->script() !!}
    {!! $projectEndingChart->script() !!}
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Average</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Starting</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Ending</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        {!! $projectAverageChart->html() !!}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        {!! $projectStartingChart->html() !!}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        {!! $projectEndingChart->html() !!}
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
