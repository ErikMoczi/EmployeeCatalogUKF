<?php

namespace App\Internal\DataLoading\Containsers\Api\RawData;


/**
 * Interface IRDPublication
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
interface IRDPublication
{
    /**
     * @return array
     */
    public function getPublicationData(): array;
}