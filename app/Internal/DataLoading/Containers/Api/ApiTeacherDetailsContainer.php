<?php

namespace App\Internal\DataLoading\Containsers\Api;

use App\Internal\DataLoading\Containsers\Api\RawData\RDProfile;
use App\Internal\DataLoading\Containsers\Api\RawData\RDTeacherDetails;

/**
 * Class ApiTeacherDetailsContainer
 * @package App\Internal\DataLoading\Containsers\Api
 */
class ApiTeacherDetailsContainer
{
    /**
     * @var RDTeacherDetails
     */
    private $teacherDetails;

    /**
     * ApiTeacherDetailsContainer constructor.
     * @param $teacherDetails
     */
    public function __construct($teacherDetails)
    {
        $this->teacherDetails = $teacherDetails;
    }

    /**
     * @return RDProfile|null
     */
    public function getProfile(): ?RDProfile
    {
        return $this->teacherDetails->getProfile();
    }

    /**
     * @return array|null
     */
    public function getActivities(): ?array
    {
        return $this->teacherDetails->getActivities();
    }

    /**
     * @return array|null
     */
    public function getProjects(): ?array
    {
        return $this->teacherDetails->getProjects();
    }

    /**
     * @return array|null
     */
    public function getPublications(): ?array
    {
        return $this->teacherDetails->getPublications();
    }
}
