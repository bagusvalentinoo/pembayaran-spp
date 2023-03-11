<?php

namespace App\Traits\Services;

use Illuminate\Support\Str;

trait ServiceResource
{
    /**
     * Set Str Replace
     *
     * @param string $filter
     * @param string $replace
     * @param string $value
     * @return array|string|string[]
     */
    protected function setStrReplace(string $filter, string $replace, string $value)
    {
        $result = '';

        switch ($filter) {
            case ' ':
                $result = str_replace(' ', $replace, $value);
                break;
            case '_':
                $result = str_replace('_', $replace, $value);
                break;
        }

        return $result;
    }

    /**
     * Str To Lower
     *
     * @param string $value
     * @return string
     */
    protected function setStrToLower(string $value)
    {
        return strtolower($value);
    }

    /**
     * Str To Upper
     *
     * @param string $value
     * @return string
     */
    protected function setStrToUpper(string $value)
    {
        return strtoupper($value);
    }

    /**
     * Set Generated Random Password
     *
     * @param int $digit
     * @return string
     */
    protected function setGeneratedRandomPassword(int $digit)
    {
        return Str::random($digit);
    }

    /**
     * Set Generated Random Last Digits Admin Username
     *
     * @param int $start
     * @param int $end
     * @param int $length
     * @return string
     */
    protected function setGeneratedRandomLastDigitsAdminUsername(int $start, int $end, int $length)
    {
        return str_pad(mt_rand($start, $end), $length, '0', STR_PAD_LEFT);
    }
}
