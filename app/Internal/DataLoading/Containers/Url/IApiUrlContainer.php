<?php

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
