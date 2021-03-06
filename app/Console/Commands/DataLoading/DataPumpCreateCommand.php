<?php

namespace App\Console\Commands\DataLoading;


use App\Internal\DataLoading\Containsers\Api\RawData\IRDActivity;
use App\Internal\DataLoading\Containsers\Api\RawData\IRDProfile;
use App\Internal\DataLoading\Containsers\Api\RawData\IRDProject;
use App\Internal\DataLoading\Containsers\Api\RawData\IRDPublication;

/**
 * Class DataPumpCreateCommand
 * @package App\Console\Commands\DataLoading
 */
class DataPumpCreateCommand extends DataPumpBaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'datapump:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @throws \Throwable
     */
    public function runPump(): void
    {
        try {
            $this->cleanUp();

            $teachers = $this->getApiTeachers()->getTeachers();

            $progressBar = $this->output->createProgressBar(count($teachers));

            foreach ($teachers as $teacher) {
                try {
                    $positionId = $this->createPosition($teacher->getPositionData());
                    $facultyId = $this->createFaculty($teacher->getFacultyData());
                    $departmentId = $this->createDepartment($teacher->getDepartmentData(), $facultyId);

                    $this->createEmployee($teacher->getEmployeeData($positionId, $departmentId));

                    $this->createUserEmployee($teacher->getUserData());

                    $teacherDetails = $this->getApiTeacherDetails($teacher->getId());

                    $this->createProfile($teacherDetails->getProfile(), $teacher->getId());
                    $this->createProjects($teacherDetails->getProjects(), $teacher->getId());
                    $this->createPublications($teacherDetails->getPublications(), $teacher->getId());
                    $this->createActivities($teacherDetails->getActivities(), $teacher->getId());

                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }

                $progressBar->advance();
            }

            $progressBar->finish();
            $this->info('');

        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     *
     */
    private function cleanUp(): void
    {
        $this->getEmployeeRepository()->delete();
        $this->getFacultyRepository()->delete();
        $this->getDepartmentRepository()->delete();
        $this->getPositionRepository()->delete();
        $this->getProfileRepository()->delete();
        $this->getActivityRepository()->delete();
        $this->getProjectRepository()->delete();
        $this->getPublicationRepository()->delete();
    }

    /**
     * @param array $data
     * @return int
     * @throws \Exception
     * @throws \Throwable
     */
    private function createPosition(array $data): int
    {
        return $this->getPositionRepository()->createUnique($data)->id;
    }

    /**
     * @param array $data
     * @return int
     * @throws \Exception
     * @throws \Throwable
     */
    private function createFaculty(array $data): int
    {
        return $this->getFacultyRepository()->createUnique($data)->id;
    }

    /**
     * @param array $data
     * @param int $facultyId
     * @return int
     * @throws \Exception
     * @throws \Throwable
     */
    private function createDepartment(array $data, int $facultyId): int
    {
        return $this->getDepartmentRepository()->createWithFacultyRelation($data, $facultyId)->id;
    }

    /**
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function createEmployee(array $data)
    {
        return $this->getEmployeeRepository()->create($data, false);
    }

    /**
     * @param array $data
     * @throws \Exception
     * @throws \Throwable
     */
    private function createUserEmployee(array $data): void
    {
        $this->getUserRepository()->createUnique($data);
    }

    /**
     * @param IRDProfile|null $data
     * @param int $employeeId
     * @throws \Exception
     * @throws \Throwable
     */
    private function createProfile(?IRDProfile $data, int $employeeId): void
    {
        if ($data) {
            $this->getProfileRepository()->createMultipleWithEmployeeRelation($data->getProfileData(), $employeeId);
        }
    }

    /**
     * @param IRDProject[] $data
     * @param int $employeeId
     * @throws \Exception
     * @throws \Throwable
     */
    private function createProjects(array $data, int $employeeId): void
    {
        foreach ($data as $item) {
            $this->getProjectRepository()->createWithEmployeeRelation($item->getProjectData(), $employeeId);
        }
    }

    /**
     * @param IRDPublication[] $data
     * @param int $employeeId
     * @throws \Exception
     * @throws \Throwable
     */
    private function createPublications(array $data, int $employeeId): void
    {
        foreach ($data as $item) {
            $this->getPublicationRepository()->createWithEmployeeRelation($item->getPublicationData(), $employeeId);
        }
    }

    /**
     * @param IRDActivity[] $data
     * @param int $employeeId
     * @throws \Exception
     * @throws \Throwable
     */
    private function createActivities(array $data, int $employeeId): void
    {
        foreach ($data as $item) {
            $this->getActivityRepository()->createWithEmployeeRelation($item->getActivityData(), $employeeId);
        }
    }
}
