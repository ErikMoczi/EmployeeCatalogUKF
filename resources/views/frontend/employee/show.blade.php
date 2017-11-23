@extends('frontend.layouts.page')

@section('content_header')
    <h1>Employee Profile</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <h3 class="profile-username text-center">{{ $employee->full_name }}</h3>

                    <p class="text-muted text-center">{{ $position->name }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Publications</b> <a class="pull-right">{{ count($publications) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Projects</b> <a class="pull-right">{{ count($projects) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Activities</b> <a class="pull-right">{{ count($activities) }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach($profiles as $profile)
                        <strong><i class="fa fa-book margin-r-5"></i>{{ $profile->getName() }}
                        </strong>

                        <p class="text-muted">
                            {{ $profile->pivot->value }}
                        </p>

                        @if (!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#publications" data-toggle="tab">Publications</a>
                    </li>
                    <li>
                        <a href="#projects" data-toggle="tab">Projects</a>
                    </li>
                    <li>
                        <a href="#activities" data-toggle="tab">Activities</a>
                    </li>
                    <li class="pull-right">
                        <ul class="pagination pagination-sm inline">
                            @if($previous_employee)
                            <li><a href="{{ route('frontend.employee.show', $previous_employee->id) }}">«</a></li>
                            @endif
                            @if($next_employee)
                            <li><a href="{{ route('frontend.employee.show', $next_employee->id) }}">»</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="publications">
                    @foreach($publications as $publication)
                        <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <span class="username">
                                        <a href="{{ route('frontend.publication.show', $publication->id) }}">{{ $publication->title }}</a>
                                    </span>
                                    <span class="description">{{ $publication->sub_title }}</span>
                                </div>
                                <!-- /.user-block -->
                                <ul class="list-inline">
                                    @if($publication->ISBN)
                                        <li>
                                            <i class="fa fa-barcode margin-r-5"></i>{{ $publication->ISBN }}
                                        </li>
                                    @endif
                                    @if($publication->publisher)
                                        <li>
                                            <i class="fa fa-frown-o margin-r-5"></i>{{ $publication->publisher }}
                                        </li>
                                    @endif
                                    @if($publication->type)
                                        <li>
                                            <i class="fa fa-creative-commons margin-r-5"></i>{{ $publication->type }}
                                        </li>
                                    @endif
                                    @if($publication->year)
                                        <li>
                                            <i class="fa fa-calendar margin-r-5"></i>{{ $publication->year }}
                                        </li>
                                    @endif
                                    @if($publication->pages > 0)
                                        <li>
                                            <i class="fa fa-sticky-note margin-r-5"></i>{{ $publication->pages }}
                                        </li>
                                    @endif
                                    @if($publication->code)
                                        <li>
                                            <i class="fa fa-code-fork margin-r-5"></i>{{ $publication->code }}
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!-- /.post -->
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="projects">
                    @foreach($projects as $project)
                        <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <span class="username">
                                        <a href="{{ route('frontend.project.show', $project->id) }}">{{ $project->title }}</a>
                                    </span>
                                    <span class="description">{{ $project->reg_number }}</span>
                                </div>
                                <!-- /.user-block -->
                                <ul class="list-inline">
                                    @if($project->year_from)
                                        <li>
                                            <i class="fa fa-calendar-plus-o margin-r-5"></i>{{ $project->year_from }}
                                        </li>
                                    @endif
                                    @if($project->year_to)
                                        <li>
                                            <i class="fa fa-calendar-minus-o margin-r-5"></i>{{ $project->year_to }}
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!-- /.post -->
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="activities">
                    @foreach($activities as $activity)
                        <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <span class="username">
                                        <a href="{{ route('frontend.activity.show', $activity->id) }}">{{ $activity->title }}</a>
                                    </span>
                                    <span class="description">{{ $activity->key }}</span>
                                </div>
                                <!-- /.user-block -->
                                <ul class="list-inline">
                                    @if($activity->date)
                                        <li>
                                            <i class="fa fa-calendar margin-r-5"></i>{{ $activity->date }}
                                        </li>
                                    @endif
                                    @if($activity->country)
                                        <li>
                                            <i class="fa fa-plane margin-r-5"></i>{{ $activity->country }}
                                        </li>
                                    @endif
                                    @if($activity->type)
                                        <li>
                                            <i class="fa fa-creative-commons margin-r-5"></i>{{ $activity->type }}
                                        </li>
                                    @endif
                                    @if($activity->category)
                                        <li>
                                            <i class="fa fa-cog margin-r-5"></i>{{ $activity->category }}
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!-- /.post -->
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
