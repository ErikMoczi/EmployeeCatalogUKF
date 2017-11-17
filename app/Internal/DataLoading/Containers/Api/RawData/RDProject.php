<?php

namespace App\Internal\DataLoading\Containsers\Api\RawData;

/**
 * Class RDProject
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
class RDProject implements IRDProject
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $yearFrom;

    /**
     * @var int
     */
    private $yearEnd;

    /**
     * @var string|null
     */
    private $regNumber;

    /**
     * @return array
     */
    public function getProjectData(): array
    {
        return [
            'title' => $this->getTitle(),
            'year_from' => $this->getYearFrom(),
            'year_to' => $this->getYearEnd(),
            'reg_number' => $this->getRegNumber()
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getYearFrom(): int
    {
        return $this->yearFrom;
    }

    /**
     * @param int $yearFrom
     * @return $this
     */
    public function setYearFrom(int $yearFrom)
    {
        $this->yearFrom = $yearFrom;
        return $this;
    }

    /**
     * @return int
     */
    public function getYearEnd(): int
    {
        return $this->yearEnd;
    }

    /**
     * @param int $yearEnd
     * @return $this
     */
    public function setYearEnd(int $yearEnd)
    {
        $this->yearEnd = $yearEnd;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegNumber(): ?string
    {
        return $this->regNumber;
    }

    /**
     * @param string|null $regNumber
     * @return $this
     */
    public function setRegNumber(?string $regNumber)
    {
        $this->regNumber = $regNumber;
        return $this;
    }
}
