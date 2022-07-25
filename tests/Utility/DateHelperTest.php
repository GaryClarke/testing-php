<?php // tests/Utility/DateHelperTest.php

namespace App\Tests\Utility;

use App\Utility\DateHelper;
use PHPUnit\Framework\TestCase;

class DateHelperTest extends TestCase
{
    /** @test */
    public function weeks_between_dates_is_calculated_correctly()
    {
        // Setup
        $date1 = date_create('2021-01-01');
        $date2 = date_create('2022-01-01');

        $dateHelper = new DateHelper();

        // Do something
        $weeksBetweenDates = $dateHelper->weeksBetweenDates($date1, $date2);

        // Make assertions
        $this->assertSame(52, $weeksBetweenDates);
    }
}