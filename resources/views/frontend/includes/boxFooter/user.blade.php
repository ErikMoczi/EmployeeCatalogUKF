@foreach($employeesList as $employee)
    <li>
        <a href="{{ route('frontend.employee.show', $employee->id) }}" class="link-black text-sm">
            <i class="fa fa-genderless margin-r-5"></i>{{ $employee->full_name }}
        </a>
    </li>
@endforeach
