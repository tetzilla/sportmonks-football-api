<?php

namespace Sportmonks\Football;

use DateTime;
use Sportmonks\Football\Exception\InvalidDateFormatException;

/**
 * Class FootballApiHelper
 * @package Sportmonks\Football
 */
class FootballApiHelper
{
    /**
     * @param string $date
     * @param string $format
     * @return string
     * @throws InvalidDateFormatException
     */
    public static function verifyDate(string $date, $format = 'Y-m-d') {
        // Create DateTime from input string & format
        $dateTime = DateTime::createFromFormat($format, $date);

        // Check for errors
        $dateTimeErrors = DateTime::getLastErrors();

        // Validate DateTime
        if (!$dateTime || ($dateTimeErrors['warning_count'] + $dateTimeErrors['error_count']) > 0) {
            throw new InvalidDateFormatException();
        }

        // Date is Valid - Return Formatted String
        return $dateTime->format($format);
    }
}