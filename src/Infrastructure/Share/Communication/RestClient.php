<?php

declare(strict_types=1);

namespace Infrastructure\Share\Communication;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class RestClient implements RestClientInterface
{
    protected const REST_CLIENT_HEADER_KEY_AUTHORIZATION = 'X-token';

    /** @var HttpClientInterface */
    private $httpClient;

    /** @var RequestStack */
    private $requestStack;

    /** @var string */
    private $host;

    public function __construct(
        RequestStack $requestStack,
        HttpClientInterface $httpClient,
        string $host = ""
    ) {
        $this->httpClient = $httpClient;
        $this->requestStack = $requestStack;
        $this->host = $host;
    }

    protected function getDefaultHeaders(): array
    {
        /** @var Request $request */
        $request = $this->requestStack->getCurrentRequest();

        if ($request->headers->has(static::REST_CLIENT_HEADER_KEY_AUTHORIZATION)) {
            return [static::REST_CLIENT_HEADER_KEY_AUTHORIZATION => $request->headers->get(static::REST_CLIENT_HEADER_KEY_AUTHORIZATION)];
        }

        return [];
    }

    public function sendGetRequest(string $endpoint, array $headers = []): ResponseInterface
    {
        return $this->httpClient->request('GET', $this->host.$endpoint, ['headers' => array_merge_recursive($this->getDefaultHeaders(), $headers)]);

    }
}
