@extends('layouts.master')

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('frontend.home') }}"><b>UKF</b> katalóg</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Reset Password</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('auth.password.email') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback" {{ $errors->has('email') ? 'has-error' : '' }}>
                    <input type="email" name="email" class="form-control" value="{{ $email or old('email') }}"
                           placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
            </form>
        </div>
    </div>
@endsection
