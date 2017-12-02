@extends('frontend.layouts.page')

@section('content_header')
    <h1>Publication details</h1>
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
                <dt>ISBN</dt>
                <dd>{{ $dataShow->ISBN }}</dd>
                <dt>Sub title</dt>
                <dd>{{ $dataShow->sub_title }}</dd>
                <dt>Publisher</dt>
                <dd>{{ $dataShow->publisher }}</dd>
                <dt>Type</dt>
                <dd>{{ $dataShow->type }}</dd>
                <dt>Pages</dt>
                <dd>{{ $dataShow->pages }}</dd>
                <dt>Year</dt>
                <dd>{{ $dataShow->year }}</dd>
                <dt>Code</dt>
                <dd>{{ $dataShow->code }}</dd>
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
