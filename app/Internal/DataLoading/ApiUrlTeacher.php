<?php

namespace App\Internal\DataLoading;

/**
 * Class ApiUrlTeacher
 * @package App\Internal\DataLoading
 */
class ApiUrlTeacher implements IApiUrlUKF
{
    /**
     * @var int
     */
    private $id;

    /**
     * ApiUrlTeacher constructor.
     * @param int $id
     */
    public function __construct(int $id = 0)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return config('datapump.api_url.teacher') . $this->id;
    }
}