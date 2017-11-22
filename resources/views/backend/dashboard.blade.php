@extends('backend.layouts.page')

@section('content_header')
    <h1>Welcome</h1>
@endsection

@section('content')
    Auth {{ auth()->user()->admin_flag }}
@endsection
