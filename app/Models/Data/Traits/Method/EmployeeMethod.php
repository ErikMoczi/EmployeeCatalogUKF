<?php


namespace App\Models\Data\Traits\Method;


use App\Models\Data\Employee;

/**
 * Trait EmployeeMethod
 * @package App\Models\Data\Traits\Method
 */
trait EmployeeMethod
{
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

    public function getNextRecord(): ?Employee
    {
        return $this->where('id', '>', $this->id)->oldest('id')->first();
    }

    public function getPreviousRecord(): ?Employee
    {
        return $this->where('id', '<', $this->id)->latest('id')->first();
    }

    public function getNextRecordByLastName(): ?Employee
    {
        return $this->where('last_name', '>', $this->last_name)->oldest('last_name')->first();
    }

    public function getPreviousRecordByLastName(): ?Employee
    {
        return $this->where('last_name', '<', $this->last_name)->latest('last_name')->first();
    }
}
