<?php

namespace App\Internal\DataLoading\Containsers\Url;

use App\Facades\General\DataPumpHelper;


/**
 * Class ApiUrlTeachersContainer
 * @package App\Internal\DataLoading\Containsers\Url
 */
class ApiUrlTeachersContainer implements IApiUrlContainer
{
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return DataPumpHelper::getApiUrlTeachers() . '';
    }
}
