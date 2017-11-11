<?php

namespace App\Internal\DataLoading\Containsers\Api\RawData;

/**
 * Class RDProfile
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
class RDProfile implements IRDProfile
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
    public function getDescription(): string
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
    public function getConsultationHours(): string
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
    public function getEducation(): string
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

    /**
     * @return array
     */
    public function getProfileData(): array
    {
        return [
            'profile_type' => [
                ['name' => 'description'],
                ['name' => 'consultation_hours'],
                ['name' => 'education'],
            ],
            'profile_value' => [
                'description' => $this->getDescription(),
                'consultation_hours' => $this->getConsultationHours(),
                'education' => $this->getEducation()
            ]
        ];
    }
}
