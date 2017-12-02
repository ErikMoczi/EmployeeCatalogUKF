<?php


namespace App\Models\Data\Traits\Method;

use App\Models\Data\Traits\Method\Base\NavigationRecordMethod;


/**
 * Class BaseMethod
 * @package App\Models\Data\Traits\Method
 */
trait BaseMethod
{
    use NavigationRecordMethod;

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getNextRecord()
    {
        return $this->getNextRecordById();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getNextRecordById()
    {
        return $this->getNextRecordByColumn();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getPreviousRecord()
    {
        return $this->getPreviosRecordById();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getPreviosRecordById()
    {
        return $this->getNextRecordByColumn();
    }

}