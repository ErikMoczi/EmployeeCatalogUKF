<?php

namespace App\Helpers\General;

/**
 * Class DataPumpHelper
 * @package App\Helpers\General
 */
class DataPumpHelper
{
    /**
     * @return string
     */
    public function getApiUrlTeachers(): string
    {
        return config('datapump.api_url.teachers');
    }

    /**
     * @return string
     */
    public function getApiUrlTeacher(): string
    {
        return config('datapump.api_url.teacher');
    }

    /**
     * @return string
     */
    public function getEmailSuffix(): string
    {
        return config('datapump.email');
    }
}
