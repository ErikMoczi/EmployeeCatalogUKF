@extends('frontend.layouts.page')

@section('content_header')
    <h1>Publication</h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $publication->title }}</h3>
            <div class="box-tools pull-right">
                @include('frontend.includes.previousNextRecord')
            </div>
        </div>
        <div class="box-body">
            <dl class="dl-horizontal">
                <dt>ISBN</dt>
                <dd>{{ $publication->ISBN }}</dd>
                <dt>Sub title</dt>
                <dd>{{ $publication->sub_title }}</dd>
                <dt>Publisher</dt>
                <dd>{{ $publication->publisher }}</dd>
                <dt>Type</dt>
                <dd>{{ $publication->type }}</dd>
                <dt>Pages</dt>
                <dd>{{ $publication->pages }}</dd>
                <dt>Year</dt>
                <dd>{{ $publication->year }}</dd>
                <dt>Code</dt>
                <dd>{{ $publication->code }}</dd>
                <dt>Total authors</dt>
                <dd>{{ count($employees) }}</dd>
            </dl>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <ul>
                @foreach($employees as $employee)
                    <li>
                        <a href="{{ route('frontend.employee.show', $employee->id) }}" class="link-black text-sm">
                            <i class="fa fa-genderless margin-r-5"></i>{{ $employee->full_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection
