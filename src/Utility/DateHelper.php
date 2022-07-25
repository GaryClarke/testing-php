<?php // src/Utility/DateHelper.php

namespace App\Utility;

class DateHelper
{
    public function weeksBetweenDates(\DateTimeInterface $dateOne, \DateTimeInterface $dateTwo): int
    {
        $differenceInDays = $dateOne->diff($dateTwo)->days;

        $differenceInWeeks = $differenceInDays / 7;

        return (int) floor($differenceInWeeks);
    }
}