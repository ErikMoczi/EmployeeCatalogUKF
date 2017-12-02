<?php

namespace App\Models\Auth\Traits\Method;

use Illuminate\Support\Carbon;

/**
 * Trait UserMethod
 * @package App\Models\Auth\Traits\Method
 */
trait UserMethod
{
    /**
     * @return string
     */
    public function getAccountCreateMonthYear()
    {
        return $this->getAccountCreate('M. Y');
    }

    /**
     * @param string $format
     * @return string
     */
    public function getAccountCreate(string $format)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format($format);
    }
}
