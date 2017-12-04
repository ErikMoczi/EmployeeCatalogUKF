@extends('backend.layouts.page')

@section('content_header')
    <h1>Comment</h1>
@endsection

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/select2/dist/css/select2.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
@endpush

@push('js')
    <!-- Select2 -->
    <script src="{{ asset('vendor/adminlte/vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create comment</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('admin.comment.store') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group has-feedback" {{ $errors->has('name') ? 'has-error' : '' }}>
                            <label for="inputName" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                       placeholder="Name"
                                       id="inputName" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" placeholder="Email"
                                       value="{{ old('email') }}"
                                       id="inputEmail" required>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback" {{ $errors->has('employee_id') ? 'has-error' : '' }}>
                            <label for="inputEmployee" class="col-sm-2 control-label">Employee</label>
                            <div class="col-sm-10">
                                <select name="employee_id" class="form-control select2" id="inputEmployee"
                                        data-placeholder="Select an Employee" required>
                                    <option></option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('employee_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employee_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback" {{ $errors->has('comment') ? 'has-error' : '' }}>
                            <label for="inputComment" class="col-sm-2 control-label">Comment</label>
                            <div class="col-sm-10">
                                <textarea name="comment" class="form-control" placeholder="text"
                                          required>{{ old('comment') }}</textarea>
                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback" {{ $errors->has('approved') ? 'has-error' : '' }}>
                            <label for="inputApproved" class="col-sm-2 control-label">Approved</label>
                            <div class="col-sm-10">
                                <div class="checkbox icheck">
                                    <input type="hidden" name="approved" value="0">
                                    <input type="checkbox" name="approved" value="1"
                                           id="inputApproved" {{ !old('approved') ? 'checked' : '' }}>
                                </div>
                                @if ($errors->has('approved'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('approved') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! form_cancel(route('admin.comment.index'), 'Cancel') !!}
                        {!! form_submit('Create') !!}
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection
