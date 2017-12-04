@extends('backend.layouts.page')

@section('content_header')
    <h1>Comments</h1>
@endsection

@section('dataTable-tools')
    <a class="btn btn-success btn-xs" href="{{ route('admin.comment.create') }}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.datatable', ['dataTableBoxHeader' => 'List of comments'])
        </div>
    </div>
@endsection
