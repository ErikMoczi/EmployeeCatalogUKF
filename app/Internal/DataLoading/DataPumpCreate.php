<?php

namespace App\Internal\DataLoading;


use App\Internal\DataLoading\Containsers\Api\RawData\IRDActivity;
use App\Internal\DataLoading\Containsers\Api\RawData\IRDProfile;
use App\Internal\DataLoading\Containsers\Api\RawData\IRDProject;
use App\Internal\DataLoading\Containsers\Api\RawData\IRDPublication;

/**
 * Class DataPumpCreate
 * @package App\Internal\DataLoading
 */
class DataPumpCreate extends DataPumpBase
{
    public function run()
    {
        dump('-------- start time ' . date("h:i:sa"));

        try {
            $this->cleanUp();

            $teachers = $this->getApiTeachers()->getTeachers();
            $total = count($teachers);
            $i = $progress = 0;

            foreach ($teachers as $teacher) {
                $i++;
                $current = round(100 * $i / $total, 0);
                if ($current <> $progress) {
                    $progress = $current;
                    dump('Loading data -> ' . $progress . ($progress < 10 ? ' ' : '') . '%');
                }

                try {
                    $this->createEmployee($teacher->getEmployeeData());

                    $teacherDetails = $this->getApiTeacherDetails($teacher->getId());

                    $this->createProfile($teacherDetails->getProfile(), $teacher->getId());
                    $this->createProjects($teacherDetails->getProjects(), $teacher->getId());
                    $this->createPublications($teacherDetails->getPublications(), $teacher->getId());
                    $this->createActivities($teacherDetails->getActivities(), $teacher->getId());

                } catch (\Exception $e) {
                    echo $e->getMessage() . PHP_EOL;
                }
            }
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }

        dump('-------- end time ' . date("h:i:sa"));
    }

    private function cleanUp()
    {
        $this->getEmployeeRepository()->delete();
        $this->getProfileRepository()->delete();
        $this->getActivityRepository()->delete();
        $this->getProjectRepository()->delete();
        $this->getPublicationRepository()->delete();
    }

    /**
     * @param array $data
     */
    private function createEmployee(array $data)
    {
        $this->getEmployeeRepository()->create($data);
    }

    /**
     * @param IRDProject[] $data
     * @param int $employeeId
     */
    private function createProjects(array $data, int $employeeId)
    {
        foreach ($data as $item) {
            $this->getProjectRepository()->createWithEmployeeRelation($item->getProjectData(), $employeeId);
        }
    }

    /**
     * @param IRDPublication[] $data
     * @param int $employeeId
     */
    private function createPublications(array $data, int $employeeId)
    {
        foreach ($data as $item) {
            $this->getPublicationRepository()->createWithEmployeeRelation($item->getPublicationData(), $employeeId);
        }
    }

    /**
     * @param IRDActivity[] $data
     * @param int $employeeId
     */
    private function createActivities(array $data, int $employeeId)
    {
        foreach ($data as $item) {
            $this->getActivityRepository()->createWithEmployeeRelation($item->getActivityData(), $employeeId);
        }
    }

    /**
     * @param IRDProfile|null $data
     * @param int $employeeId
     */
    private function createProfile(?IRDProfile $data, int $employeeId)
    {
        if ($data) {
            $this->getProfileRepository()->createMultipleWithEmployeeRelation($data->getProfileData(), $employeeId);
        }
    }
}
