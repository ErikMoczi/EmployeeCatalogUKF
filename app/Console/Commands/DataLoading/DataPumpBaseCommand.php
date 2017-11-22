<?php

namespace App\Console\Commands\DataLoading;


use App\Exceptions\GeneralException;
use App\Internal\DataLoading\ApiCommunication;
use App\Internal\DataLoading\Containsers\Api\ApiTeacherDetailsContainer;
use App\Internal\DataLoading\Containsers\Api\ApiTeachersContainer;
use App\Internal\DataLoading\Containsers\Api\RawData\RDTeacher;
use App\Internal\DataLoading\Containsers\Api\RawData\RDTeacherDetails;
use App\Internal\DataLoading\Containsers\Url\ApiUrlTeacherContainer;
use App\Internal\DataLoading\Containsers\Url\ApiUrlTeachersContainer;
use App\Internal\DataLoading\Containsers\Url\IApiUrlContainer;
use App\Repositories\DataLoading\ActivityRepository;
use App\Repositories\DataLoading\DepartmentRepository;
use App\Repositories\DataLoading\EmployeeRepository;
use App\Repositories\DataLoading\FacultyRepository;
use App\Repositories\DataLoading\PositionRepository;
use App\Repositories\DataLoading\ProfileRepository;
use App\Repositories\DataLoading\ProjectRepository;
use App\Repositories\DataLoading\PublicationRepository;
use App\Repositories\DataLoading\UserRepository;
use Illuminate\Console\Command;

/**
 * Class DataPumpBaseCommand
 * @package App\Console\Commands\DataLoading
 */
abstract class DataPumpBaseCommand extends Command implements IDataPump
{
    /**
     * @var ApiCommunication
     */
    private $apiCommunication;

    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;

    /**
     * @var ActivityRepository
     */
    private $activityRepository;

    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * @var PublicationRepository
     */
    private $publicationRepository;

    /**
     * @var ProfileRepository
     */
    private $profileRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var PositionRepository
     */
    private $positionRepository;

    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;
    /**
     * @var FacultyRepository
     */
    private $facultyRepository;

    /**
     * DataPumpBaseCommand constructor.
     * @param ApiCommunication $apiCommunication
     * @param EmployeeRepository $employeeRepository
     * @param ActivityRepository $activityRepository
     * @param ProjectRepository $projectRepository
     * @param PublicationRepository $publicationRepository
     * @param ProfileRepository $profileRepository
     * @param UserRepository $userRepository
     * @param PositionRepository $positionRepository
     * @param DepartmentRepository $departmentRepository
     * @param FacultyRepository $facultyRepository
     */
    public function __construct(
        ApiCommunication $apiCommunication,
        EmployeeRepository $employeeRepository,
        ActivityRepository $activityRepository,
        ProjectRepository $projectRepository,
        PublicationRepository $publicationRepository,
        ProfileRepository $profileRepository,
        UserRepository $userRepository,
        PositionRepository $positionRepository,
        DepartmentRepository $departmentRepository,
        FacultyRepository $facultyRepository
    )
    {
        parent::__construct();

        $this->apiCommunication = $apiCommunication;
        $this->employeeRepository = $employeeRepository;
        $this->activityRepository = $activityRepository;
        $this->projectRepository = $projectRepository;
        $this->publicationRepository = $publicationRepository;
        $this->profileRepository = $profileRepository;
        $this->userRepository = $userRepository;
        $this->positionRepository = $positionRepository;
        $this->departmentRepository = $departmentRepository;
        $this->facultyRepository = $facultyRepository;
    }

    /**
     * @return PositionRepository
     */
    public function getPositionRepository(): PositionRepository
    {
        return $this->positionRepository;
    }

    /**
     * @return DepartmentRepository
     */
    public function getDepartmentRepository(): DepartmentRepository
    {
        return $this->departmentRepository;
    }

    /**
     * @return FacultyRepository
     */
    public function getFacultyRepository(): FacultyRepository
    {
        return $this->facultyRepository;
    }

    /**
     * @return EmployeeRepository
     */
    public function getEmployeeRepository(): EmployeeRepository
    {
        return $this->employeeRepository;
    }

    /**
     * @return ActivityRepository
     */
    public function getActivityRepository(): ActivityRepository
    {
        return $this->activityRepository;
    }

    /**
     * @return ProjectRepository
     */
    public function getProjectRepository(): ProjectRepository
    {
        return $this->projectRepository;
    }

    /**
     * @return PublicationRepository
     */
    public function getPublicationRepository(): PublicationRepository
    {
        return $this->publicationRepository;
    }

    /**
     * @return ProfileRepository
     */
    public function getProfileRepository(): ProfileRepository
    {
        return $this->profileRepository;
    }

    /**
     * @return UserRepository
     */
    public function getUserRepository(): UserRepository
    {
        return $this->userRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('-----> start time ' . date("h:i:sa"));

        $this->runPump();

        $this->info('-----> end time ' . date("h:i:sa"));
    }

    /**
     * @return ApiTeachersContainer
     * @throws GeneralException
     */
    protected function getApiTeachers(): ApiTeachersContainer
    {
        $teachers = $this->apiRequest(new ApiUrlTeachersContainer());

        if (is_null($teachers)) {
            throw new GeneralException('Missing request data for teachers!');
        }

        return new ApiTeachersContainer(
            $this->mapJsonToObject($teachers, RDTeacher::class, true)
        );
    }

    /**
     * @param IApiUrlContainer $apiUrlContainer
     * @return mixed
     */
    private function apiRequest(IApiUrlContainer $apiUrlContainer)
    {
        return $this->apiCommunication->requestData($apiUrlContainer);
    }

    /**
     * @param $jsonData
     * @param string $className
     * @param bool $isArray
     * @return array|mixed|object
     */
    private function mapJsonToObject($jsonData, string $className, bool $isArray = false)
    {
        $mapArray = array();

        try {
            $jsonMapper = new \JsonMapper();

            if ($isArray) {
                $mapArray = $jsonMapper->mapArray($jsonData, array(), $className);
            } else {
                $mapArray = $jsonMapper->map($jsonData, new $className);
            }

        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }

        return $mapArray;
    }

    /**
     * @param int $id
     * @return ApiTeacherDetailsContainer
     * @throws GeneralException
     */
    protected function getApiTeacherDetails(int $id): ApiTeacherDetailsContainer
    {
        $teacher = $this->apiRequest(new ApiUrlTeacherContainer($id));

        if (is_null($teacher)) {
            throw new GeneralException('Missing request data for teacher id {' . $id . '}!');
        }

        return new ApiTeacherDetailsContainer(
            $this->mapJsonToObject($teacher, RDTeacherDetails::class)
        );
    }
}
