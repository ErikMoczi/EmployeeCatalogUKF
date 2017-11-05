<?php

namespace App\Internal\DataLoading;

use App\Internal\DataLoading\Containsers\Api\ApiTeacherDetailsContainer;
use App\Internal\DataLoading\Containsers\Api\ApiTeachersContainer;
use App\Internal\DataLoading\Containsers\Api\RawData\Teacher;
use App\Internal\DataLoading\Containsers\Api\RawData\TeacherDetails;
use App\Internal\DataLoading\Containsers\Url\ApiUrlTeacherContainer;
use App\Internal\DataLoading\Containsers\Url\ApiUrlTeachersContainer;

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

        $jsonMapper = new \JsonMapper();

        return new ApiTeachersContainer(
            $jsonMapper->mapArray(
                $teachers,
                array(),
                Teacher::class
            )
        );
    }

    protected function getApiTeacherDetails(int $id) : ApiTeacherDetailsContainer
    {
        $teacher = $this->apiRequest(new ApiUrlTeacherContainer($id));

        $jsonMapper = new \JsonMapper();

        return new ApiTeacherDetailsContainer(
            $jsonMapper->mapArray(
                $teacher,
                array(),
                TeacherDetails::class
            )
        );
    }

    private function apiRequest(IApiUrlContainer $apiUrlContainer)
    {
        return $this->apiCommunication->requestData($apiUrlContainer);
    }
}