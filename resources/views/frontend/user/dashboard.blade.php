@extends('frontend.layouts.page')

@section('content_header')
    <h1>Welcome</h1>
@endsection

@section('content')
    User dashboard {{ auth()->user()->admin_flag }}
@endsection
