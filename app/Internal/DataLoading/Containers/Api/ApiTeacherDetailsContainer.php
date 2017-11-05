<?php

namespace App\Internal\DataLoading\Containsers\Api;

use App\Internal\DataLoading\Containsers\Api\RawData\TeacherDetails;

class ApiTeacherDetailsContainer
{
    /**
     * @var array
     */
    private $teacherDetails;

    public function __construct(array $teacherDetails)
    {
        $this->teacherDetails = $teacherDetails;
    }

    public function getTeacherDetails(): TeacherDetails
    {
        return $this->teacherDetails;
    }
}
