<?php

namespace App\Internal\DataLoading\Containsers\Api\RawData;


/**
 * Class RDTeacher
 * @package App\Internal\DataLoading\Containsers\Api\RawData
 */
class RDTeacher implements IRDTeacher
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
     * @return array
     */
    public function getEmployeeData(): array
    {
        return array_merge(
            $this->getEmployeeExplodeName(),
            [
                'id' => $this->getId(),
                'full_name' => $this->getName(),
                'position' => $this->getDescription(),
                'dep_name' => $this->getDepartment(),
                'dep_acronym' => $this->getDepAcronym(),
                'faculty_name' => $this->getFaculty(),
                'faculty_acronym' => $this->getFacultyAcronym()
            ]);
    }

    /**
     * @return array
     */
    private function getEmployeeExplodeName(): array
    {
        $explodeName = [
            'first_name' => null,
            'middle_name' => null,
            'last_name' => null
        ];

        $fullName = preg_replace('(\w+\.)', '', $this->getName());
        $fullName = rtrim(trim($fullName), ',');
        $names = preg_replace('/[[:blank:]]+/', ' ', $fullName);
        $names = explode(' ', $names);

        switch (count($names)) {
            case 0: {
                break;
            }
            case 1: {
                $explodeName['last_name'] = $names[0];
                break;
            }
            case 2: {
                $explodeName['first_name'] = $names[0];
                $explodeName['last_name'] = $names[1];
                break;
            }
            case 3: {
                $explodeName['first_name'] = $names[0];
                $explodeName['middle_name'] = $names[1];
                $explodeName['last_name'] = $names[2];
                break;
            }
            default: {
                $explodeName['first_name'] = $names[0];
                $explodeName['middle_name'] = $names[1];
                $explodeName['last_name'] = $names[2];
                break;
            }
        }

        return $explodeName;
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
     * @return array
     */
    public function getUserData(): array
    {
        $name = $this->getEmployeeExplodeName();
        $prefix = substr(iconv('UTF-8', 'ASCII//TRANSLIT', $name['first_name']), 0, 1);
        $suffix = iconv('UTF-8', 'ASCII//TRANSLIT', $name['last_name']);

        return [
            'name' => $this->getName(),
            'email' => strtolower($prefix . $suffix . config('datapump.email')),
            'password' => bcrypt(str_random(6)),
            'employee_id' => $this->getId()
        ];
    }
}
