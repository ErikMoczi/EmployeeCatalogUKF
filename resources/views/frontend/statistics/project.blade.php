@extends('frontend.layouts.page')

@section('content_header')
    <h1>Project statistics</h1>
@endsection

@push('css')
    {!! Charts::styles() !!}
@endpush

@push('js')
    {!! Charts::scripts() !!}
    @foreach($yearCharts as $value)
        {!! $value->script() !!}
    @endforeach
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    @foreach($yearCharts as $key => $value)
                        <li {{ $loop->first ? 'class=active' : '' }}>
                            <a href="#year_tab_{{ $loop->iteration }}" data-toggle="tab">{{ $key }}</a>
                        </li>
                    @endforeach
                    <li class="pull-left header">Sort by years</li>
                </ul>
                <div class="tab-content">
                    @foreach($yearCharts as $key => $value)
                        <div class="tab-pane {{ $loop->first ? 'active' : '' }}"
                             id="year_tab_{{ $loop->iteration }}">
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
