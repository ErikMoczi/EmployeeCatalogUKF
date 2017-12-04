@extends('backend.layouts.page')

@section('content_header')
    <h1>Comment</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Display comment</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $comment->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $comment->email }}</td>
                        </tr>
                        <tr>
                            <th>Comment</th>
                            <td>{{ $comment->comment }}</td>
                        </tr>
                        <tr>
                            <th>Employee</th>
                            <td>
                                @if($comment->employee)
                                    <a href="{{ route('frontend.employee.show', $comment->employee->id) }}">{{ $comment->employee->full_name }}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Approved</th>
                            <td>
                                @if($comment->approved)
                                    <span class="glyphicon glyphicon-ok text-success"></span>
                                @else
                                    <span class="glyphicon glyphicon-remove text-danger"></span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{ $comment->created_at }} {{ $comment->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th>Last updated</th>
                            <td>{{ $comment->updated_at }} {{ $comment->updated_at->diffForHumans() }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! form_cancel(route('admin.comment.index'), 'Back') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
