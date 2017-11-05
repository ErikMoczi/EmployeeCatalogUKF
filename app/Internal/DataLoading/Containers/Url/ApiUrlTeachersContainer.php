<?php
/**
 * Created by PhpStorm.
 * User: Erik
 * Date: 4.11.2017
 * Time: 19:48
 */

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
    public function getUrl() : string
    {
        return config('datapump.api_url.teachers') . '';
    }
}
