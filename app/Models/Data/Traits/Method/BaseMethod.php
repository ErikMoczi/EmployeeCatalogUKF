<?php


namespace App\Models\Data\Traits\Method;


/**
 * Class BaseMethod
 * @package App\Models\Data\Traits\Method
 */
trait BaseMethod
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getNextRecord()
    {
        return $this->where('id', '>', $this->id)->oldest('id')->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getPreviousRecord()
    {
        return $this->where('id', '<', $this->id)->latest('id')->first();
    }
}