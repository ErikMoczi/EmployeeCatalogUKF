@extends('frontend.layouts.page')

@section('content_header')
    <h1>Faculty statistics</h1>
@endsection

@push('css')
    {!! Charts::styles() !!}
@endpush

@push('js')
    {!! Charts::scripts() !!}
    {!! $facultyDepartmentChart->script() !!}
    {!! $facultyEmployeeChart->script() !!}
    @foreach($facultyPositionChart as $item)
        {!! $item->script() !!}
    @endforeach
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#category_tab_1" data-toggle="tab">Departments</a></li>
                    <li><a href="#category_tab_2" data-toggle="tab">Employees</a></li>
                    <li class="pull-left header">Sort by categories</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="category_tab_1">
                        {!! $facultyDepartmentChart->html() !!}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="category_tab_2">
                        {!! $facultyEmployeeChart->html() !!}
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    @foreach($facultyPositionChart as $index => $item)
                        <li {{ $loop->first ? 'class=active' : '' }}>
                            <a href="#position_tab_{{ $loop->iteration }}" data-toggle="tab">{{ $index }}</a>
                        </li>
                    @endforeach
                    <li class="pull-left header">Sort by positions</li>
                </ul>
                <div class="tab-content">
                    @foreach($facultyPositionChart as $index => $item)
                        <div class="tab-pane {{ $loop->first ? 'active' : '' }}"
                             id="position_tab_{{ $loop->iteration }}">
                            {!! $item->html() !!}
                        </div>
                        <!-- /.tab-pane -->
                    @endforeach
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
@endsection
