<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="{{ active_class(Active::checkUriPattern('employee*')) }}">
            <a href="{{ route('frontend.employee.index') }}">Employees</a>
        </li>
        <li class="dropdown {{ active_class(Active::checkUriPattern(['publication*', 'project*', 'activity*'])) }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Publishing <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li class="{{ active_class(Active::checkUriPattern('publication*')) }}">
                    <a href="{{ route('frontend.publication.index') }}">Publications</a>
                </li>
                <li class="{{ active_class(Active::checkUriPattern('project*')) }}">
                    <a href="{{ route('frontend.project.index') }}">Projects</a>
                </li>
                <li class="{{ active_class(Active::checkUriPattern('activity*')) }}">
                    <a href="{{ route('frontend.activity.index') }}">Activities</a>
                </li>
            </ul>
        </li>
        <li class="dropdown {{ active_class(Active::checkUriPattern(['position*', 'department*', 'faculty*'])) }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li class="{{ active_class(Active::checkUriPattern('position*')) }}">
                    <a href="{{ route('frontend.position.index') }}">Positions</a>
                </li>
                <li class="{{ active_class(Active::checkUriPattern('department*')) }}">
                    <a href="{{ route('frontend.department.index') }}">Departments</a>
                </li>
                <li class="{{ active_class(Active::checkUriPattern('faculty*')) }}">
                    <a href="{{ route('frontend.faculty.index') }}">Faculties</a>
                </li>
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
