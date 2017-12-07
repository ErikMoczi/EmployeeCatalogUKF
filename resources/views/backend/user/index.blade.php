@extends('backend.layouts.page')

@section('content_header')
    <h1>Users</h1>
@endsection

@section('dataTable-tools')
    <a class="btn btn-success btn-xs" href="{{ route('admin.user.create') }}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.datatable', ['dataTableBoxHeader' => 'List of users'])
        </div>
    </div>
@endsection
