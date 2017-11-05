<?php
/**
 * Created by PhpStorm.
 * User: Erik
 * Date: 4.11.2017
 * Time: 19:46
 */

namespace App\Internal\DataLoading\Containsers\Url;

/**
 * Interface IApiUrlContainer
 * @package App\Internal\DataLoading\Containsers\Url
 */
interface IApiUrlContainer
{
    /**
     * @return string
     */
    public function getUrl(): string;
}
