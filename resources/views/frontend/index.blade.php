@extends('frontend.layouts.page')

@section('content_header')
    <h1>Welcome</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green-gradient"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Employees</span>
                    <span class="info-box-number">{{ $employeeCount }}</span>
                    <div class="pull-right">
                        <a href="{{ route('frontend.employee.index') }}" class="info-box-text">
                            More <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red-gradient"><i class="fa fa-files-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Publications</span>
                    <span class="info-box-number">{{ $publicationCount }}</span>
                    <div class="pull-right">
                        <a href="{{ route('frontend.publication.index') }}" class="info-box-text">
                            More <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-teal-gradient"><i class="fa fa-briefcase"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Projects</span>
                    <span class="info-box-number">{{ $projectCount }}</span>
                    <div class="pull-right">
                        <a href="{{ route('frontend.project.index') }}" class="info-box-text">
                            More <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow-gradient"><i class="fa fa-child"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Activities</span>
                    <span class="info-box-number">{{ $activityCount }}</span>
                    <div class="pull-right">
                        <a href="{{ route('frontend.activity.index') }}" class="info-box-text">
                            More <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Top 5 employees of publishings</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th style="width: 15px">Rank</th>
                            <th>Employee</th>
                            <th class="text-center" style="width: 30px">Total</th>
                            <th class="text-center" style="width: 30px">Percentage</th>
                            <th class="text-center">Link</th>
                        </tr>
                        @foreach($topEmployees as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item->full_name }}</td>
                                <td class="text-right">{{ $item->publishing_count }}</td>
                                <td class="text-right"><span class="badge bg-red-gradient">{{ $item->publishing_percentage }} %</span></td>
                                <td class="text-center">
                                    <a href="{{ route('frontend.employee.show', $item->id) }}" class="btn btn-info btn-xs">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
