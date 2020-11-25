<?php

declare(strict_types=1);

namespace Infrastructure\Share\Communication;

use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

interface RestClientInterface
{
    /**
     * Send Get Request and return response result as ResponseInterface.
     *
     * @param string $endpoint
     * @param array $headers
     *
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function sendGetRequest(string $endpoint, array $headers = []): ResponseInterface;
}
