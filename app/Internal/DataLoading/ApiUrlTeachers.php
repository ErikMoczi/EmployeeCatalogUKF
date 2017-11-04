<?php

namespace App\Internal\DataLoading;

/**
 * Class ApiUrlTeachers
 * @package App\Internal\DataLoading
 */
class ApiUrlTeachers implements IApiUrlUKF
{
    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getUrl()
    {
        return config('datapump.api_url.teachers');
    }
}