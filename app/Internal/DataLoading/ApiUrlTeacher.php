<?php

namespace App\Internal\DataLoading;

class ApiUrlTeacher implements IApiUrlUKF
{
    private $id;

    public function __construct(int $id = 0)
    {
        $this->id = $id;
    }

    public function getUrl()
    {
        return config('datapump.api_url.teacher') . $this->id;
    }
}