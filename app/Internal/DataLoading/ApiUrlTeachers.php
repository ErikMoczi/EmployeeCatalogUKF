<?php

namespace App\Internal\DataLoading;

/**
 * Class ApiUrlTeachers
 * @package App\Internal\DataLoading
 */
class ApiUrlTeachers implements IApiUrlUKF
{
    /**
     * @return string
     */
    public function getUrl() : string
    {
        return config('datapump.api_url.teachers');
    }
}