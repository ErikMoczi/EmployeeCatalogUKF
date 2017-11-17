<?php

namespace App\Internal\DataLoading\Containsers\Api;

use App\Exceptions\GeneralException;
use App\Internal\DataLoading\Containsers\Api\RawData\IRDTeacher;
use App\Internal\DataLoading\Containsers\Api\RawData\RDTeacher;

/**
 * Class ApiTeachersContainer
 * @package App\Internal\DataLoading\Containsers\Api
 */
class ApiTeachersContainer
{
    /**
     * @var RDTeacher[]
     */
    private $teachers;

    /**
     * ApiTeachersContainer constructor.
     * @param RDTeacher[] $teachers
     */
    public function __construct(array $teachers)
    {
        $this->teachers = $teachers;
    }

    /**
     * @return IRDTeacher[]
     */
    public function getTeachers(): array
    {
        return $this->teachers;
    }

    /**
     * @param int $index
     * @return IRDTeacher
     * @throws GeneralException
     */
    public function getTeacher(int $index): IRDTeacher
    {
        if (!isset($this->teachers[$index])) {
            throw new GeneralException('Incorect index of teacher!');
        }

        return $this->teachers[$index];
    }
}
