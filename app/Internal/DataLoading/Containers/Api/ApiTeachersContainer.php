<?php

namespace App\Internal\DataLoading\Containsers\Api;

use App\Exceptions\GeneralException;
use App\Internal\DataLoading\Containsers\Api\RawData\RDTeacher;

/**
 * Class ApiTeachersContainer
 * @package App\Internal\DataLoading\Containsers\Api
 */
class ApiTeachersContainer
{
    /**
     * @var array
     */
    private $teachers;

    /**
     * @return array
     */
    public function getTeachers(): array
    {
        return $this->teachers;
    }

    /**
     * ApiTeachersContainer constructor.
     * @param array $teachers
     */
    public function __construct(array $teachers)
    {
        $this->teachers = $teachers;
    }

    /**
     * @param int $index
     * @return RDTeacher
     * @throws GeneralException
     */
    public function getTeacher(int $index): RDTeacher
    {
        if (!isset($this->teachers[$index])) {
            throw new GeneralException('Incorect index of teacher!');
        }

        return $this->teachers[$index];
    }
}
