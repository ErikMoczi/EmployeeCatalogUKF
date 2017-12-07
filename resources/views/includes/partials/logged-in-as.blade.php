@if (auth()->user() && session()->has("observer_user_id") && session()->has("temp_user_id"))
    <div class="alert alert-warning">
        You are currently logged in as {{ auth()->user()->name }}. <a href="{{ route("auth.logout-as") }}">Re-Login
            as {{ session()->get("observer_user_name") }}</a>.
    </div><!--alert alert-warning logged-in-as-->
@endif
