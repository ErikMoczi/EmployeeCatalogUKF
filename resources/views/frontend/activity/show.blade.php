@extends('frontend.layouts.page')

@section('content_header')
    <h1>Activity</h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $activity->title }}</h3>
        </div>
        <div class="box-body">
            <dl class="dl-horizontal">
                <dt>Key</dt>
                <dd>{{ $activity->key }}</dd>
                <dt>Date</dt>
                <dd>{{ $activity->date }}</dd>
                <dt>Country</dt>
                <dd>{{ $activity->country }}</dd>
                <dt>Type</dt>
                <dd>{{ $activity->type }}</dd>
                <dt>Category</dt>
                <dd>{{ $activity->category }}</dd>
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
