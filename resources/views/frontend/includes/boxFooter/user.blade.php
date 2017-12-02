<ul>
    @foreach($employeesList as $employee)
        <li>
            <a href="{{ route('frontend.employee.show', $employee->id) }}" class="link-black text-sm">
                {{ $employee->full_name }}
            </a>
        </li>
    @endforeach
</ul>
