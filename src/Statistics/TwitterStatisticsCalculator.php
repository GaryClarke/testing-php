<?php // src/Statistics/TwitterStatisticsCalculator.php

namespace App\Statistics;

use App\Entity\TwitterAccount;
use App\Utility\DateHelper;

class TwitterStatisticsCalculator
{
    private DateHelper $dateHelper;

    public function __construct(DateHelper $dateHelper)
    {
        $this->dateHelper = $dateHelper;
    }

    public function newFollowersPerWeek(
        ?TwitterAccount $lastRecord,
        int $currentFollowerCount,
        \DateTimeInterface $checkDate
    ): int
    {
        if (!$lastRecord) {
            return 0;
        }

        $followerCountDifference = $currentFollowerCount - $lastRecord->getFollowerCount();

        $fullWeeks = $this->dateHelper->weeksBetweenDates(
            $checkDate, $lastRecord->getCreatedAt());

        $newFollowersPerWeek = $followerCountDifference / max($fullWeeks, 1);

        return (int) $newFollowersPerWeek;
    }
}