<form role="form" method="post"
      action="{{ route('frontend.user.profile.update') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PATCH">
    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="inputName">Name</label>
        <input type="text" name="name" class="form-control" id="inputName" value="{{ $logged_in_user->name }}"
               placeholder="Name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="alert alert-info">
        <i class="fa fa-info-circle"></i> If you change your e-mail you will be logged out.
    </div>
    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="inputEmail">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $logged_in_user->email }}"
               id="inputEmail" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-flat">Update profile</button>
</form>
