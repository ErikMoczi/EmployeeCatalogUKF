@extends('frontend.layouts.page')

@section('content_header')
    <h1>Position details</h1>
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
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <ul>
                @include('frontend.includes.boxFooter.user', ['employeesList' => $dataShow->employees])
            </ul>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection
