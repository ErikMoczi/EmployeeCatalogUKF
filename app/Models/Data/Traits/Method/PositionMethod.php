<?php


namespace App\Models\Data\Traits\Method;


/**
 * Trait PositionMethod
 * @package App\Models\Data\Traits\Method
 */
trait PositionMethod
{
    use BaseMethod;

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     * @throws \App\Exceptions\GeneralException
     */
    public function getNextRecord()
    {
        return $this->getNextRecordByColumn('name');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     * @throws \App\Exceptions\GeneralException
     */
    public function getPreviousRecord()
    {
        return $this->getPreviousRecordByColumn('name');
    }
}
