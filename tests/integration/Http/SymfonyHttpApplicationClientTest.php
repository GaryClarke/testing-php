<?php // tests/integration/Http/SymfonyHttpApplicationClientTest.php

namespace App\Tests\integration\Http;

use App\Http\ApplicationClientException;
use App\Http\SymfonyHttpApplicationClient;
use PHPUnit\Framework\TestCase;

/**
 * @group external
 */
class SymfonyHttpApplicationClientTest extends TestCase
{
    private const PHPUNIT_ID = 19057969;
    private const BASE_URL = 'https://api.twitter.com/2/';

    /** @test */
    public function get_retrieves_the_correct_data_from_the_twitter_api()
    {
        // Setup
        $httpClient = \Symfony\Component\HttpClient\HttpClient::create([
                    'headers' => ['Authorization' => BEARER_TOKEN]
        ]);

        $symfonyHttpApplicationClient = new SymfonyHttpApplicationClient($httpClient);

        $url = self::BASE_URL . 'users/' . self::PHPUNIT_ID . '?user.fields=public_metrics';

        // Do something
        $result = $symfonyHttpApplicationClient->get($url);
        $userData = json_decode($result, true)['data'];

        // Make assertions
        $this->assertJson($result);
        $this->assertEquals(self::PHPUNIT_ID, $userData['id']);
        $this->assertSame('phpunit', $userData['username']);
        $this->assertArrayHasKey('public_metrics', $userData);
        $this->assertArrayHasKey('followers_count', $userData['public_metrics']);

    }

    /** @test */
    public function the_correct_exception_is_thrown_when_a_fake_bearer_token_is_sent()
    {
        // Setup
        $httpClient = \Symfony\Component\HttpClient\HttpClient::create([
            'headers' => ['Authorization' => 'fake_bearer_token']
        ]);

        $symfonyHttpApplicationClient = new SymfonyHttpApplicationClient($httpClient);

        $url = self::BASE_URL . 'users/' . self::PHPUNIT_ID . '?user.fields=public_metrics';

        $this->expectExceptionCode(401);
        $this->expectException(ApplicationClientException::class);
        $this->expectExceptionMessage('Unauthorized');

        // Do something
        $response = $symfonyHttpApplicationClient->get($url);
    }
}