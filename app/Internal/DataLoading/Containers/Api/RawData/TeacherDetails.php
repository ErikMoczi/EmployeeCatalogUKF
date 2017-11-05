<?php
/**
 * Created by PhpStorm.
 * User: Erik
 * Date: 4.11.2017
 * Time: 22:21
 */

namespace App\Internal\DataLoading\Containsers\Api\RawData;

/**
 * Class TeacherDetails
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
class TeacherDetails
{
    /**
     * @var Profile|null
     */
    private $profile;

    /**
     * @var Publication[]|null
     */
    private $publications;

    /**
     * @var Project[]|null
     */
    private $projects;

    /**
     * @var Activity[]|null
     */
    private $activities;

    /**
     * @return Profile|null
     */
    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    /**
     * @param Profile|null $profile
     * @return $this
     */
    public function setProfile(?Profile $profile)
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * @return Publication[]|null
     */
    public function getPublications(): ?array
    {
        return $this->publications;
    }

    /**
     * @param Publication[]|null $publications
     * @return $this
     */
    public function setPublications(?array $publications)
    {
        $this->publications = $publications;
        return $this;
    }

    /**
     * @return Project[]|null
     */
    public function getProjects(): ?array
    {
        return $this->projects;
    }

    /**
     * @param Project[]|null $projects
     * @return $this
     */
    public function setProjects(?array $projects)
    {
        $this->projects = $projects;
        return $this;
    }

    /**
     * @return Activity[]|null
     */
    public function getActivities(): ?array
    {
        return $this->activities;
    }

    /**
     * @param Activity[]|null $activities
     * @return $this
     */
    public function setActivities(?array $activities)
    {
        $this->activities = $activities;
        return $this;
    }
}
