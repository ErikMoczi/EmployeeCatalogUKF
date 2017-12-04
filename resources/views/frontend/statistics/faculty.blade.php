@extends('frontend.layouts.page')

@section('content_header')
    <h1>Faculty statistics</h1>
@endsection

@push('css')
    {!! Charts::styles() !!}
@endpush

@push('js')
    {!! Charts::scripts() !!}
    @foreach($categoryCharts as $value)
        {!! $value->script() !!}
    @endforeach
    @foreach($positionCharts as $value)
        {!! $value->script() !!}
    @endforeach
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    @foreach($categoryCharts as $key => $value)
                        <li {{ $loop->first ? 'class=active' : '' }}>
                            <a href="#category_tab_{{ $loop->iteration }}" data-toggle="tab">{{ $key }}</a>
                        </li>
                    @endforeach
                    <li class="pull-left header">Sort by categories</li>
                </ul>
                <div class="tab-content">
                    @foreach($categoryCharts as $key => $value)
                        <div class="tab-pane {{ $loop->first ? 'active' : '' }}"
                             id="category_tab_{{ $loop->iteration }}">
                            {!! $value->html() !!}
                        </div>
                        <!-- /.tab-pane -->
                    @endforeach
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    @foreach($positionCharts as $key => $value)
                        <li {{ $loop->first ? 'class=active' : '' }}>
                            <a href="#position_tab_{{ $loop->iteration }}" data-toggle="tab">{{ $key }}</a>
                        </li>
                    @endforeach
                    <li class="pull-left header">Sort by positions</li>
                </ul>
                <div class="tab-content">
                    @foreach($positionCharts as $key => $value)
                        <div class="tab-pane {{ $loop->first ? 'active' : '' }}"
                             id="position_tab_{{ $loop->iteration }}">
                            {!! $value->html() !!}
                        </div>
                        <!-- /.tab-pane -->
                    @endforeach
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
@endsection
