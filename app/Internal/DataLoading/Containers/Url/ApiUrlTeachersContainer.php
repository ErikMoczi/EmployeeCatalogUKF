<?php

namespace App\Internal\DataLoading\Containsers\Url;

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
        return config('datapump.api_url.teachers') . '';
    }
}
