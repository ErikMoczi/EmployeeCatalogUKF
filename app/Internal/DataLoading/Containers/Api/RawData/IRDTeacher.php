<?php

namespace App\Internal\DataLoading\Containsers\Api\RawData;


/**
 * Interface IRDTeacher
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
interface IRDTeacher
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return array
     */
    public function getEmployeeData(): array;

    /**
     * @return array
     */
    public function getUserData(): array;
}
