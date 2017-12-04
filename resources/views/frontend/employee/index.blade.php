@extends('frontend.layouts.page')

@section('content_header')
    <h1>Employees</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.datatable', ['dataTableBoxHeader' => 'List of employees'])
        </div>
    </div>
@endsection
