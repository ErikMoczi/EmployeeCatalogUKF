<?php

namespace App\Models\Data\Traits\Method;


/**
 * Trait ProfileTypeMethod
 * @package App\Models\Data\Traits\Method
 */
trait ProfileTypeMethod
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return ucfirst(str_replace('_', ' ', $this->name));
    }
}
