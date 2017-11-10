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
     * @return IRDProfile|null
     */
    public function getProfile(): ?IRDProfile
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
     * @return IRDPublication[]
     */
    public function getPublications(): array
    {
        return $this->publications ? $this->publications : array();
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
     * @return IRDProject[]
     */
    public function getProjects(): array
    {
        return $this->projects ? $this->projects : array();
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
     * @return IRDActivity[]
     */
    public function getActivities(): array
    {
        return $this->activities ? $this->activities : array();
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
