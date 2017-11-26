@extends('frontend.layouts.page')

@section('content_header')
    <h1>Positions</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('includes.datatable', ['dataTableBoxHeader' => 'List of positions'])
        </div>
    </div>
@endsection
