<?php // src/Entity/TwitterAccount.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="twitter_account")
 * @ORM\Entity(repositoryClass="App\Repository\TwitterAccountRepository")
 */
class TwitterAccount
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="bigint", name="twitter_account_id")
     */
    private $twitterAccountId;

    /**
     * @ORM\Column(type="string", name="username")
     */
    private $username;

    /**
     * @ORM\Column(type="integer", name="follower_count", nullable=true)
     */
    private $followerCount;

    /**
     * @ORM\Column(type="integer", name="following_count", nullable=true)
     */
    private $followingCount;

    /**
     * @ORM\Column(type="integer", name="followers_per_week", nullable=true)
     */
    private $followersPerWeek;

    /**
     * @ORM\Column(type="integer", name="tweet_count", nullable=true)
     */
    private $tweetCount;

    /**
     * @ORM\Column(type="integer", name="listed_count", nullable=true)
     */
    private $listedCount;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     * @var \DateTimeInterface
     */
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $twitterAccountId
     */
    public function setTwitterAccountId($twitterAccountId): void
    {
        $this->twitterAccountId = $twitterAccountId;
    }

    /**
     * @return mixed
     */
    public function getFollowerCount()
    {
        return $this->followerCount;
    }

    /**
     * @param mixed $followerCount
     */
    public function setFollowerCount($followerCount): void
    {
        $this->followerCount = $followerCount;
    }

    /**
     * @param mixed $followersPerWeek
     */
    public function setFollowersPerWeek($followersPerWeek): void
    {
        $this->followersPerWeek = $followersPerWeek;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeImmutable|\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed $followingCount
     */
    public function setFollowingCount($followingCount): void
    {
        $this->followingCount = $followingCount;
    }

    /**
     * @param mixed $tweetCount
     */
    public function setTweetCount($tweetCount): void
    {
        $this->tweetCount = $tweetCount;
    }

    /**
     * @param mixed $listedCount
     */
    public function setListedCount($listedCount): void
    {
        $this->listedCount = $listedCount;
    }

    /**
     * @param \DateTimeInterface $createdAt
     */
    public function setCreatedAt(\DateTimeImmutable|\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}