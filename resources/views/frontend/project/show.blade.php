@extends('frontend.layouts.page')

@section('content_header')
    <h1>Project details</h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $dataShow->title }}</h3>
            <div class="box-tools pull-right">
                @include('frontend.includes.previousNextRecord')
            </div>
        </div>
        <div class="box-body">
            <dl class="dl-horizontal">
                <dt>Year from</dt>
                <dd>{{ $dataShow->year_from }}</dd>
                <dt>Year to</dt>
                <dd>{{ $dataShow->year_to }}</dd>
                <dt>Registration number</dt>
                <dd>{{ $dataShow->reg_number }}</dd>
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
