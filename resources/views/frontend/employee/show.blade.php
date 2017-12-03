@extends('frontend.layouts.page')

@section('content_header')
    <h1>Employee Profile details</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         src="{{ Gravatar::src($userEmail) }}" alt="User profile picture">
                    <h3 class="profile-username text-center">{{ $dataShow->full_name }}</h3>

                    <p class="text-muted text-center">
                        <a href="{{ route('frontend.position.show', $dataShow->position->id) }}">{{ $dataShow->position->name }}</a>
                    </p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Department</b>
                            <p class="text-muted">
                                <a href="{{ route('frontend.department.show', $dataShow->department->id) }}">
                                    {{ $dataShow->department->name }}
                                </a>
                            </p>
                        </li>
                        <li class="list-group-item">
                            <b>Faculty</b>
                            <p class="text-muted">
                                <a href="{{ route('frontend.faculty.show', $dataShow->faculty->id) }}">
                                    {{ $dataShow->faculty->name }}
                                </a>
                            </p>
                        </li>
                        <li class="list-group-item">
                            <b>Publications</b> <a class="pull-right">{{ count($dataShow->publications) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Projects</b> <a class="pull-right">{{ count($dataShow->projects) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Activities</b> <a class="pull-right">{{ count($dataShow->activities) }}</a>
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
                    @foreach($dataShow->profiles as $profile)
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
                    <li>
                        <a href="#comments" data-toggle="tab">
                            <i class="fa fa-comments-o"></i>Comments ({{ count($dataShow->approvedComments) }})
                        </a>
                    </li>
                    <li class="pull-right">
                        @include('frontend.includes.previousNextRecord')
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="publications">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                        @foreach($dataShow->publications as $publication)
                            <!-- timeline item -->
                                <li>
                                    <i class="fa fa-copy bg-green"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header">
                                            <a href="{{ route('frontend.publication.show', $publication->id) }}">
                                                {{ $publication->title }}
                                            </a>
                                            @if($publication->sub_title)
                                                : {{ $publication->sub_title }}
                                            @endif
                                        </h3>
                                        <div class="timeline-body">
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
                                        <div class="timeline-footer">
                                            <a href="{{ route('frontend.publication.show', $publication->id) }}"
                                               class="btn btn-primary btn-xs">Details</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="projects">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                        @foreach($dataShow->projects as $project)
                            <!-- timeline item -->
                                <li>
                                    <i class="fa fa-copy bg-red"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header">
                                            <a href="{{ route('frontend.project.show', $project->id) }}">
                                                {{ $project->title }}
                                            </a>
                                            @if($project->reg_number)
                                                : {{ $project->reg_number }}
                                            @endif
                                        </h3>
                                        <div class="timeline-body">
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
                                        <div class="timeline-footer">
                                            <a href="{{ route('frontend.project.show', $project->id) }}"
                                               class="btn btn-primary btn-xs">Details</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="activities">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                        @foreach($dataShow->activities as $activity)
                            <!-- timeline item -->
                                <li>
                                    <i class="fa fa-copy bg-yellow"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header">
                                            <a href="{{ route('frontend.activity.show', $activity->id) }}">
                                                {{ $activity->title }}
                                            </a>
                                            @if($activity->key)
                                                : {{ $activity->key }}
                                            @endif
                                        </h3>
                                        <div class="timeline-body">
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
                                        <div class="timeline-footer">
                                            <a href="{{ route('frontend.activity.show', $activity->id) }}"
                                               class="btn btn-primary btn-xs">Details</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="comments">
                        @foreach($dataShow->approvedComments as $comment)
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="{{ Gravatar::src($comment->email) }}"
                                         alt="user image">
                                    <span class="username">
                                    <a href="#">{{ $comment->name }}</a>
                                </span>
                                    <span class="description">{{ $comment->created_at }}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>{{ $comment->comment }}</p>
                            </div>
                            <!-- /.post -->
                        @endforeach
                        <div class="box box-solid">
                            <div class="box-header">Create new comment</div>
                            <form role="form" method="post"
                                  action="{{ route('frontend.employee.comment.store', $dataShow->id) }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group has-feedback" {{ $errors->has('name') ? 'has-error' : '' }}>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ old('name') }}"
                                                   placeholder="Name" required>
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group has-feedback" {{ $errors->has('email') ? 'has-error' : '' }}>
                                            <input type="email" name="email" class="form-control"
                                                   value="{{ old('email') }}"
                                                   placeholder="Email" required>
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <textarea type="text" name="comment" class="form-control"
                                                  placeholder="text" required></textarea>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-info btn-flat">Comment</button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
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
