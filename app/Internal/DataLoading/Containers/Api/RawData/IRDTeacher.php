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
     * @param int $positionId
     * @param int $departmentId
     * @return array
     */
    public function getEmployeeData(int $positionId, int $departmentId): array;

    /**
     * @return array
     */
    public function getUserData(): array;

    /**
     * @return array
     */
    public function getPositionData(): array;

    /**
     * @return array
     */
    public function getFacultyData(): array;

    /**
     * @return array
     */
    public function getDepartmentData(): array;
}
