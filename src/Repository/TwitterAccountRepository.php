<?php // src/Repository/TwitterAccountRepository.php

namespace App\Repository;

use App\Entity\TwitterAccount;
use Doctrine\ORM\EntityRepository;

class TwitterAccountRepository extends EntityRepository
{
    public function lastRecord(int $accountId): ?TwitterAccount
    {
        $query = $this->createQueryBuilder('ta')
            ->andWhere('ta.twitterAccountId = :accountId')
            ->orderBy('ta.createdAt', 'DESC')
            ->setParameter('accountId', $accountId)
            ->setMaxResults(1)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    public function addFromArray(array $userData)
    {
        $twitterAccount = new $this->_entityName();
        $twitterAccount->setTwitterAccountId($userData['id']);
        $twitterAccount->setUsername($userData['username']);
        $twitterAccount->setTweetCount($userData['tweet_count']);
        $twitterAccount->setListedCount($userData['listed_count']);
        $twitterAccount->setFollowingCount($userData['following_count']);
        $twitterAccount->setFollowerCount($userData['followers_count']);
        $twitterAccount->setFollowersPerWeek($userData['new_followers_per_week']);
        $this->_em->persist($twitterAccount);
    }









}