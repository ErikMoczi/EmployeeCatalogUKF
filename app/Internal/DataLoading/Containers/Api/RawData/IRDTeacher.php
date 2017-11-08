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
    public function getFacultyData(): array;

    /**
     * @param int $facultyId
     * @return array
     */
    public function getDepartmentData(int $facultyId): array;

    /**
     * @param int $departmentId
     * @param int $positionId
     * @return array
     */
    public function getEmployeeData(int $departmentId, int $positionId): array;
}
