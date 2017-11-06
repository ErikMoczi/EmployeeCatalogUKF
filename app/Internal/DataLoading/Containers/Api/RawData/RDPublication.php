<?php

namespace App\Internal\DataLoading\Containsers\Api\RawData;

/**
 * Class RDPublication
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
class RDPublication
{
    /**
     * @var string
     */
    private $isbn;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $subTitle;

    /**
     * @var string
     */
    private $allAuthors;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $publisher;

    /**
     * @var int
     */
    private $pages;

    /**
     * @var string|null
     */
    private $year;

    /**
     * @var string
     */
    private $code;

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     * @return $this
     */
    public function setIsbn(string $isbn)
    {
        $this->isbn = $isbn;
        return $this;
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
     * @return string
     */
    public function getSubTitle(): string
    {
        return $this->subTitle;
    }

    /**
     * @param string $subTitle
     * @return $this
     */
    public function setSubTitle(string $subTitle)
    {
        $this->subTitle = $subTitle;
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
    public function getPublisher(): string
    {
        return $this->publisher;
    }

    /**
     * @param string $publisher
     * @return $this
     */
    public function setPublisher(string $publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * @return int
     */
    public function getPages(): int
    {
        return $this->pages;
    }

    /**
     * @param int $pages
     * @return $this
     */
    public function setPages(int $pages)
    {
        $this->pages = $pages;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getYear(): ?string
    {
        return $this->year;
    }

    /**
     * @param null|string $year
     * @return $this
     */
    public function setYear(?string $year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code)
    {
        $this->code = $code;
        return $this;
    }
}
