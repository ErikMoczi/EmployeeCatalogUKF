<?php

namespace App\Internal\DataLoading\Containsers\Api\RawData;

/**
 * Class RDActivity
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
class RDActivity
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $titile;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $allAuthors;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate(string $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitile(): string
    {
        return $this->titile;
    }

    /**
     * @param string $titile
     * @return $this
     */
    public function setTitile(string $titile)
    {
        $this->titile = $titile;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return $this
     */
    public function setCategory(string $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getAllAuthors(): string
    {
        return $this->allAuthors;
    }

    /**
     * @param string $allAuthors
     * @return $this
     */
    public function setAllAuthors(string $allAuthors)
    {
        $this->allAuthors = $allAuthors;
        return $this;
    }
}