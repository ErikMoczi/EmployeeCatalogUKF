<?php

namespace App\Internal\DataLoading\Containsers\Api\RawData;

/**
 * Class RDTeacher
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
class RDTeacher
{
    /**
     * @var int
     * @required
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $department;

    /**
     * @var string
     */
    private $depAcronym;

    /**
     * @var string
     */
    private $faculty;

    /**
     * @var string
     */
    private $facultyAcronym;

    /**
     * @var string
     */
    private $description;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     * @return $this
     */
    public function setDepartment(string $department)
    {
        $this->department = $department;
        return $this;
    }

    /**
     * @return string
     */
    public function getDepAcronym(): string
    {
        return $this->depAcronym;
    }

    /**
     * @param string $depAcronym
     * @return $this
     */
    public function setDepAcronym(string $depAcronym)
    {
        $this->depAcronym = $depAcronym;
        return $this;
    }

    /**
     * @return string
     */
    public function getFaculty(): string
    {
        return $this->faculty;
    }

    /**
     * @param string $faculty
     * @return $this
     */
    public function setFaculty(string $faculty)
    {
        $this->faculty = $faculty;
        return $this;
    }

    /**
     * @return string
     */
    public function getFacultyAcronym(): string
    {
        return $this->facultyAcronym;
    }

    /**
     * @param string $facultyAcronym
     * @return $this
     */
    public function setFacultyAcronym(string $facultyAcronym)
    {
        $this->facultyAcronym = $facultyAcronym;
        return $this;
    }

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
}
