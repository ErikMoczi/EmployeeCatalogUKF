<form role="form" method="post"
      action="{{ route('auth.password.update') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PATCH">
    <div class="form-group has-feedback {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
        <input type="password" name="oldPassword" class="form-control"
               placeholder="Old Password"
               required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('oldPassword'))
            <span class="help-block">
                <strong>{{ $errors->first('oldPassword') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
        <input type="password" name="password" class="form-control" placeholder="New Password"
               required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
        <input type="password" name="password_confirmation" class="form-control"
               placeholder="Confirm Password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-flat">Update Password</button>
</form>
