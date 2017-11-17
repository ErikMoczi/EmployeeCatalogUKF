<?php

namespace App\Helpers\General;

/**
 * Class EmailHelper
 * @package App\Helpers\General
 */
class EmailHelper
{
    /**
     * @param string $email
     * @param int $newPosition
     * @return string
     */
    public function transformEmail(string $email, int $newPosition): string
    {
        return $this->getEmailPrefix($email) . abs($newPosition) . $this->getEmailSuffix($email);
    }

    /**
     * @param string $email
     * @return string
     */
    public function getEmailPrefix(string $email): string
    {
        return strstr($email, '@', true);
    }

    /**
     * @param string $email
     * @return string
     */
    public function getEmailSuffix(string $email): string
    {
        return strstr($email, '@');
    }
}
