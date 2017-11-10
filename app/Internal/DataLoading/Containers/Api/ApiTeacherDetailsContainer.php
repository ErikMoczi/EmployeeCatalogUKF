<?php

namespace App\Internal\DataLoading\Containsers\Api;

use App\Internal\DataLoading\Containsers\Api\RawData\IRDActivity;
use App\Internal\DataLoading\Containsers\Api\RawData\IRDProfile;
use App\Internal\DataLoading\Containsers\Api\RawData\IRDProject;
use App\Internal\DataLoading\Containsers\Api\RawData\IRDPublication;
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
     * @return IRDProfile|null
     */
    public function getProfile(): ?IRDProfile
    {
        return $this->teacherDetails->getProfile();
    }

    /**
     * @return IRDActivity[]
     */
    public function getActivities(): array
    {
        return $this->teacherDetails->getActivities();
    }

    /**
     * @return IRDProject[]
     */
    public function getProjects(): array
    {
        return $this->teacherDetails->getProjects();
    }

    /**
     * @return IRDPublication[]
     */
    public function getPublications(): array
    {
        return $this->teacherDetails->getPublications();
    }
}
