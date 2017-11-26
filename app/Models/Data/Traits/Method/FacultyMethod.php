<?php

namespace App\Models\Data\Traits\Method;

use App\Models\Data\Faculty;

/**
 * Trait FacultyMethod
 * @package App\Models\Data\Traits\Method
 */
trait FacultyMethod
{
    use BaseMethod;

    /**
     * @return Faculty
     */
    public static function getDefaultRecord()
    {
        $defaultRecord = with(new static)->where('name', '=', with(new static)->getAttribute('name'))->first();

        if (!$defaultRecord) {
            $defaultRecord = with(new static)->createDefaultRecord();
        }

        return $defaultRecord;
    }

    /**
     * @return Faculty
     */
    public function createDefaultRecord()
    {
        return $this->create(['name' => $this->getAttribute('name')]);
    }
}
