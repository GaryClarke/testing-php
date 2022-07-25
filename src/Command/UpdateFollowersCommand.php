<?php // src/Command/UpdateFollowersCommand.php

namespace App\Command;

use App\Http\TwitterClient;
use App\Entity\TwitterAccount;
use App\Statistics\TwitterStatisticsCalculator;
use App\Utility\DateHelper;
use Doctrine\ORM\EntityManagerInterface;

class UpdateFollowersCommand
{
    private array $accountIds;
    private TwitterClient $twitterClient;
    private EntityManagerInterface $entityManager;
    private \DateTimeInterface $processDate;

    public function __construct(
        EntityManagerInterface $entityManager,
        TwitterClient $twitterClient,
        array $accountIds,
        \DateTimeInterface $processDate
    )
    {
        $this->entityManager = $entityManager;
        $this->twitterClient = $twitterClient;
        $this->accountIds = $accountIds;
        $this->processDate = $processDate;
    }

    public function execute()
    {
        foreach ($this->accountIds as $accountId) {

            // 1. ping twitter api for user data (TwitterClient::getUserById())
            $user = $this->twitterClient->getUserById($accountId);

            // 2. Calculate number of new followers per week since last check
            $repo = $this->entityManager->getRepository(TwitterAccount::class);
            $lastRecord = $repo->lastRecord($accountId);

            $user['new_followers_per_week'] = (new TwitterStatisticsCalculator(
                new DateHelper()))
                ->newFollowersPerWeek(
                $lastRecord, $user['followers_count'], $this->processDate
            );

            // 3. Create a new record in DB with updated values
            $repo->addFromArray($user);
        }

        $this->entityManager->flush();
    }
}