<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="active"><a href="{{ route('frontend.employee.index') }}">Employees</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Publishing <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('frontend.publication.index') }}">Publications</a></li>
                <li><a href="{{ route('frontend.project.index') }}">Projects</a></li>
                <li><a href="{{ route('frontend.activity.index') }}">Activities</a></li>
            </ul>
        </li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
        </div>
    </form>
</div>
<!-- /.navbar-collapse -->
