<?php

namespace App\Core\Support\Conversions\DateTime;

use DateTime;
use Exception;

class DateTimeStringConversion
{
    /**
     * @param string|null $date
     * @param string $format
     * @return DateTime|Exception|null
     */
    protected function convertStringToDateTime (?string $date, string $format = 'd/m/Y H:i:s'): DateTime|null|Exception
    {
        $date = DateTime::createFromFormat($format, $date);

        if ($date instanceof DateTime) {
            return $date;
        }

        if (!$date == '' || $date == null) {
            return null;
        }

        return new Exception();
    }
}
