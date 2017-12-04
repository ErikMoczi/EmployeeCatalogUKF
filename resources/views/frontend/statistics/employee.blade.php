@extends('frontend.layouts.page')

@section('content_header')
    <h1>Employee statistics</h1>
@endsection

@push('css')
    {!! Charts::styles() !!}
@endpush

@push('js')
    {!! Charts::scripts() !!}
    {!! $publishingChart->script() !!}
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Publishing report</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            {!! $publishingChart->html() !!}
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Average publishing per Employee</strong>
                            </p>
                            @foreach($publishingAggregate as $value)
                                <div class="progress-group">
                                    <span class="progress-text">{{ ucfirst($value->type) }}</span>
                                    <span class="progress-number">
                                        <span class="text-green">{{ $value->aggregate_min }}</span>
                                        / <b>{{ $value->aggregate_avg }}</b> / <span
                                                class="text-red">{{ $value->aggregate_max }}</span>
                                    </span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-red"
                                             style="width: {{ round(100 * $value->aggregate_avg / ($value->aggregate_max - $value->aggregate_min), 2) }}%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            @endforeach
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        @foreach($dataStats as $key => $value)
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header pull-left">{{ $key }}</h5>
                                    <ul class="pull-left text-left">
                                        @foreach($value['data'] as $name => $publishing)
                                            <li>
                                                <span class="text-blue">{{ strtoupper($name) }}
                                                    :</span> {{ $publishing['shared'] + $publishing['unique'] }} [<span
                                                        class="text-purple">{{ $publishing['percentage'] }}%</span>]
                                                (Shared:
                                                <span class="text-red">{{ $publishing['shared'] }}</span> |
                                                Unique: <span class="text-green">{{ $publishing['unique'] }}</span>)
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        @endforeach
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
