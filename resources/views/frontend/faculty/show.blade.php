@extends('frontend.layouts.page')

@section('content_header')
    <h1>Faculty details</h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $dataShow->name }}</h3>
            <div class="box-tools pull-right">
                @include('frontend.includes.previousNextRecord')
            </div>
        </div>
        <div class="box-body">
            <dl class="dl-horizontal">
                <dt>Acronym</dt>
                <dd>{{ $dataShow->acronym }}</dd>
                <dt>Total departments</dt>
                <dd>{{ count($dataShow->departments) }}</dd>
                <dt>Total authors</dt>
                <dd>{{ count($dataShow->employees) }}</dd>
            </dl>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            @include('frontend.includes.boxFooter.user', ['employeesList' => $dataShow->employees])
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection
