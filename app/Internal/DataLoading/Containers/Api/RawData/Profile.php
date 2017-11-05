<?php
/**
 * Created by PhpStorm.
 * User: Erik
 * Date: 4.11.2017
 * Time: 22:29
 */

namespace App\Internal\DataLoading\Containsers\Api\RawData;


/**
 * Class Profile
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
class Profile
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $consultationHours;

    /**
     * @var string
     */
    private $education;

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getConsultationHours() : string
    {
        return $this->consultationHours;
    }

    /**
     * @param string $consultationHours
     * @return $this
     */
    public function setConsultationHours(string $consultationHours)
    {
        $this->consultationHours = $consultationHours;
        return $this;
    }

    /**
     * @return string
     */
    public function getEducation() : string
    {
        return $this->education;
    }

    /**
     * @param string $education
     * @return $this
     */
    public function setEducation(string $education)
    {
        $this->education = $education;
        return $this;
    }
}