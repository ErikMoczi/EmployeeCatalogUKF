<?php

namespace App\Internal\DataLoading\Containsers\Api\RawData;

/**
 * Class RDTeacherDetails
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
class RDTeacherDetails
{
    /**
     * @var RDProfile|null
     */
    private $profile;

    /**
     * @var RDPublication[]|null
     */
    private $publications;

    /**
     * @var RDProject[]|null
     */
    private $projects;

    /**
     * @var RDActivity[]|null
     */
    private $activities;

    /**
     * @return RDProfile|null
     */
    public function getProfile(): ?RDProfile
    {
        return $this->profile;
    }

    /**
     * @param RDProfile|null $profile
     * @return $this
     */
    public function setProfile(?RDProfile $profile)
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * @return RDPublication[]|null
     */
    public function getPublications(): ?array
    {
        return $this->publications;
    }

    /**
     * @param RDPublication[]|null $publications
     * @return $this
     */
    public function setPublications(?array $publications)
    {
        $this->publications = $publications;
        return $this;
    }

    /**
     * @return RDProject[]|null
     */
    public function getProjects(): ?array
    {
        return $this->projects;
    }

    /**
     * @param RDProject[]|null $projects
     * @return $this
     */
    public function setProjects(?array $projects)
    {
        $this->projects = $projects;
        return $this;
    }

    /**
     * @return RDActivity[]|null
     */
    public function getActivities(): ?array
    {
        return $this->activities;
    }

    /**
     * @param RDActivity[]|null $activities
     * @return $this
     */
    public function setActivities(?array $activities)
    {
        $this->activities = $activities;
        return $this;
    }
}
