<?php

declare(strict_types=1);

namespace Infrastructure\Product\Communication\Read;

use Infrastructure\Product\Communication\DataMapper\RestProductAttributesDataMapper;
use Infrastructure\Share\Communication\RestClientInterface;

class RestReadProductAttributesClient
{
    /** @var RestClientInterface  */
    private $restClient;

    /** @var RestProductAttributesDataMapper */
    private $dataMapper;


    public function __construct(RestClientInterface $restClient, RestProductAttributesDataMapper $dataMapper)
    {
        $this->restClient = $restClient;
        $this->dataMapper = $dataMapper;
    }
    public function findByProductId(string $productId): array
    {
        $response = $this->restClient->sendGetRequest('/product/'.$productId);
        $decodedResponse = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);

        return $this->dataMapper->fromResponse($decodedResponse);
    }
}