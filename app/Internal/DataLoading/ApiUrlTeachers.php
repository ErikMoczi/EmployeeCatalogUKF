<?php

namespace App\Internal\DataLoading;

class ApiUrlTeachers implements IApiUrlUKF
{
    public function getUrl()
    {
        return config('datapump.api_url.teachers');
    }
}