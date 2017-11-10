<?php

namespace App\Internal\DataLoading\Containsers\Api\RawData;


/**
 * Interface IRDActivity
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
interface IRDActivity
{
    /**
     * @return array
     */
    public function getActivityData(): array;
}