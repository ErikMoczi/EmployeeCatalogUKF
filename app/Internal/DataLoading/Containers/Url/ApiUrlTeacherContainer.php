<?php

namespace App\Internal\DataLoading\Containsers\Url;

use App\Facades\General\DataPumpHelper;


/**
 * Class ApiUrlTeacherContainer
 * @package App\Internal\DataLoading\Containsers\Url
 */
class ApiUrlTeacherContainer implements IApiUrlContainer
{
    /**
     * @var int
     */
    private $id;

    /**
     * ApiUrlTeacherContainer constructor.
     * @param int $id
     */
    public function __construct(int $id = 0)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return DataPumpHelper::getApiUrlTeacher() . $this->id;
    }
}
