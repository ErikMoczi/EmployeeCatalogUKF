@extends('backend.layouts.page')

@section('content_header')
    <h1>User</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Display user</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Employee</th>
                            <td>
                                @if($user->employee)
                                    <a href="{{ route('frontend.employee.show', $user->employee->id) }}">{{ $user->employee->full_name }}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Admin</th>
                            <td>
                                @if($user->admin_flag)
                                    <span class="glyphicon glyphicon-ok text-success"></span>
                                @else
                                    <span class="glyphicon glyphicon-remove text-danger"></span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{ $user->created_at }} {{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th>Last updated</th>
                            <td>{{ $user->updated_at }} {{ $user->updated_at->diffForHumans() }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! form_cancel(route('admin.user.index'), 'Back') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
