<table class="table table-hover">
    <tbody>
    <tr>
        <th>Name</th>
        <td>{{ $logged_in_user->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $logged_in_user->email }}</td>
    </tr>
    <tr>
        <th>Employee</th>
        <td>
            @if($logged_in_user->employee)
                <a href="{{ route('frontend.employee.show', $logged_in_user->employee->id) }}">{{ $logged_in_user->employee->full_name }}</a>
            @endif
        </td>
    </tr>
    <tr>
        <th>Role</th>
        <td>
            @if($logged_in_user->isAdmin())
                Admin
            @else
                User
            @endif
        </td>
    </tr>
    <tr>
        <th>Created at</th>
        <td>{{ $logged_in_user->created_at }}
            ({{ $logged_in_user->created_at->diffForHumans() }})
        </td>
    </tr>
    <tr>
        <th>Last updated</th>
        <td>{{ $logged_in_user->updated_at }}
            ({{ $logged_in_user->updated_at->diffForHumans() }})
        </td>
    </tr>
    </tbody>
</table>
