<?php

namespace App\Internal\DataLoading;

use App\Internal\DataLoading\Containsers\Api\ApiTeacherDetailsContainer;
use App\Internal\DataLoading\Containsers\Api\ApiTeachersContainer;
use App\Internal\DataLoading\Containsers\Api\RawData\Teacher;
use App\Internal\DataLoading\Containsers\Api\RawData\TeacherDetails;
use App\Internal\DataLoading\Containsers\Url\ApiUrlTeacherContainer;
use App\Internal\DataLoading\Containsers\Url\ApiUrlTeachersContainer;
use App\Internal\DataLoading\Containsers\Url\IApiUrlContainer;

/**
 * Class DataPumpBase
 * @package App\Internal\DataLoading
 */
abstract class DataPumpBase implements IDataPump
{
    /**
     * @var ApiCommunication
     */
    private $apiCommunication;

    /**
     * DataPumpBase constructor.
     * @param ApiCommunication $apiCommunication
     */
    public function __construct(ApiCommunication $apiCommunication)
    {
        $this->apiCommunication = $apiCommunication;
    }

    /**
     * @return ApiTeachersContainer
     */
    protected function getApiTeachers() : ApiTeachersContainer
    {
        $teachers = $this->apiRequest(new ApiUrlTeachersContainer());

        return new ApiTeachersContainer(
            $this->mapJsonToObject($teachers, Teacher::class)
        );
    }

    /**
     * @param int $id
     * @return ApiTeacherDetailsContainer
     */
    protected function getApiTeacherDetails(int $id) : ApiTeacherDetailsContainer
    {
        $teacher = $this->apiRequest(new ApiUrlTeacherContainer($id));

        return new ApiTeacherDetailsContainer(
            $this->mapJsonToObject($teacher, TeacherDetails::class)
        );
    }

    /**
     * @param IApiUrlContainer $apiUrlContainer
     * @return array
     */
    private function apiRequest(IApiUrlContainer $apiUrlContainer) : array
    {
        return $this->apiCommunication->requestData($apiUrlContainer);
    }

    /**
     * @param array $jsonData
     * @param string $className
     * @return array
     */
    private function mapJsonToObject(array $jsonData, string $className) : array
    {
        $jsonMapper = new \JsonMapper();
        return $jsonMapper->mapArray($jsonData, array(), $className);
    }
}