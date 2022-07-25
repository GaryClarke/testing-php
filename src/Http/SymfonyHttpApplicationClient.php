<?php // src/Http/SymfonyHttpApplicationClient

namespace App\Http;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class SymfonyHttpApplicationClient implements ApplicationClientInterface
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }


    public function get(string $url): string
    {
        try {

            $response = $this->httpClient->request('GET', $url);

            return $response->getContent();

        } catch (\Exception $exception) {

            throw new ApplicationClientException(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}