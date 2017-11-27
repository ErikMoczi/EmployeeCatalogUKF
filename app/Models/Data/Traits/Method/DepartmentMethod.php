<?php


namespace App\Models\Data\Traits\Method;


/**
 * Trait DepartmentMethod
 * @package App\Models\Data\Traits\Method
 */
trait DepartmentMethod
{
    use BaseMethod;

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getNextRecord()
    {
        return $this->getNextRecordByColumn('name');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getPreviousRecord()
    {
        return $this->getPreviousRecordByColumn('name');
    }
}
