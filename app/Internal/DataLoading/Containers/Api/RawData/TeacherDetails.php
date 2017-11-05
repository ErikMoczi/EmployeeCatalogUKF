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
     * @var Profile
     */
    private $profile;

    /**
     * @var \ArrayObject[Publication]
     */
    private $publications;

    /**
     * @var \ArrayObject[Project]
     */
    private $projects;

    /**
     * @var \ArrayObject[Activity]
     */
    private $activities;

    /**
     * @return Profile
     */
    public function getProfile(): Profile
    {
        return $this->profile;
    }

    /**
     * @param Profile $profile
     * @return $this
     */
    public function setProfile(Profile $profile)
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * @return \ArrayObject[Publication]
     */
    public function getPublications(): \ArrayObject
    {
        return $this->publications;
    }

    /**
     * @param \ArrayObject $publications
     * @return $this
     */
    public function setPublications(\ArrayObject $publications)
    {
        $this->publications = $publications;
        return $this;
    }

    /**
     * @return \ArrayObject[Project]
     */
    public function getProjects(): \ArrayObject
    {
        return $this->projects;
    }

    /**
     * @param \ArrayObject $projects
     * @return $this
     */
    public function setProjects(\ArrayObject $projects)
    {
        $this->projects = $projects;
        return $this;
    }

    /**
     * @return \ArrayObject[Activity]
     */
    public function getActivities(): \ArrayObject
    {
        return $this->activities;
    }

    /**
     * @param \ArrayObject $activities
     * @return $this
     */
    public function setActivities(\ArrayObject $activities)
    {
        $this->activities = $activities;
        return $this;
    }
}
