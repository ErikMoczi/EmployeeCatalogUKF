<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="{{ Gravatar::src($logged_in_user->email) }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>{{ $logged_in_user->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
