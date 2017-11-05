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
     * @return mixed
     */
    private function apiRequest(IApiUrlContainer $apiUrlContainer)
    {
        return $this->apiCommunication->requestData($apiUrlContainer);
    }

    /**
     * @param mixed $jsonData
     * @param string $className
     * @return array
     */
    private function mapJsonToObject($jsonData, string $className) : array
    {
        $mapArray = array();

        try {
            $jsonMapper = new \JsonMapper();
            $mapArray = $jsonMapper->mapArray($jsonData, array(), $className);
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }

        return $mapArray;
    }
}