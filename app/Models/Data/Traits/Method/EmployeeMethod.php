<?php


namespace App\Models\Data\Traits\Method;


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
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getNextRecord()
    {
        return $this->getNextRecordByColumn('last_name');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getPreviousRecord()
    {
        return $this->getPreviousRecordByColumn('last_name');
    }
}
