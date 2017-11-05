<?php
/**
 * Created by PhpStorm.
 * User: Erik
 * Date: 4.11.2017
 * Time: 19:47
 */

namespace App\Internal\DataLoading\Containsers\Url;

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
        return config('datapump.api_url.teacher') . $this->id;
    }
}
