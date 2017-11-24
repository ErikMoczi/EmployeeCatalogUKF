<?php


namespace App\Models\Data\Traits\Method;


use App\Models\Data\Employee;

/**
 * Trait EmployeeMethod
 * @package App\Models\Data\Traits\Method
 */
trait EmployeeMethod
{
    use BaseMethod;

    /**
     * @return string
     */
    public function getName(): string
    {
        return preg_replace(
            "/[[:blank:]]+/",
            " ",
            $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name
        );
    }

    /**
     * @return Employee|null
     */
    public function getNextRecordByLastName(): ?Employee
    {
        return $this->where('last_name', '>', $this->last_name)->oldest('last_name')->first();
    }

    /**
     * @return Employee|null
     */
    public function getPreviousRecordByLastName(): ?Employee
    {
        return $this->where('last_name', '<', $this->last_name)->latest('last_name')->first();
    }
}
