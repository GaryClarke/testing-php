<?php

namespace App\Tests\Http;

use App\Http\ApplicationClientInterface;
use App\Http\TwitterClient;
use PHPUnit\Framework\TestCase;

class TwitterClientTest extends TestCase
{

    /**
     * @test
     *
     * We want to test in isolation
     * There is a dependency which hits a 3rd party service
     * ApplicationClientInterface makes it easy to switch for a mock
     * Would not work without an internet connection
     */
    public function getUserById_returns_correctly_formatted_user_data()
    {
        // Setup
        $applicationClient = $this->createMock(ApplicationClientInterface::class);
        $twitterClient = new TwitterClient($applicationClient);
        $accountId = 1234;

        $applicationClient->expects($this->once())
            ->method('get')
            ->with($this->anything())
            ->willReturn('{"data":{"name":"PHPUnit","username":"phpunit","public_metrics":{"followers_count":2227,"following_count":0,"tweet_count":525,"listed_count":107},"id":"1234"}}');

        // Do something
        $user = $twitterClient->getUserById($accountId);

        // Make assertions
        $this->assertEquals([
            "followers_count" => 2227,
            "following_count" => 0,
            "tweet_count"     => 525,
            "listed_count"    => 107,
            "name"            => "PHPUnit",
            "id"              => "1234",
            "username"        => "phpunit",
        ],
            $user
        );
    }


}