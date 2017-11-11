<?php

namespace App\Internal\DataLoading;

use App\Exceptions\GeneralException;
use App\Internal\DataLoading\Containsers\Api\ApiTeacherDetailsContainer;
use App\Internal\DataLoading\Containsers\Api\ApiTeachersContainer;
use App\Internal\DataLoading\Containsers\Api\RawData\RDTeacher;
use App\Internal\DataLoading\Containsers\Api\RawData\RDTeacherDetails;
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
}
