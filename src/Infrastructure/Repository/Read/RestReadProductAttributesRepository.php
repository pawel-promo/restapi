<?php

declare(strict_types=1);

namespace Infrastructure\Repository\Read;

use Domain\Product\Repository\FindProductAttributesByProductIdInterface;
use Infrastructure\Product\Communication\Read\RestReadProductAttributesClient;

class RestReadProductAttributesRepository implements FindProductAttributesByProductIdInterface
{
    /** @var RestReadProductAttributesClient */
    private $restReadProductAttributesClient;

    public function __construct(RestReadProductAttributesClient $restReadProductAttributesClient)
    {
        $this->restReadProductAttributesClient = $restReadProductAttributesClient;
    }

    public function findProductAttributesByProductId(string $productId): array
    {
        return $this->restReadProductAttributesClient->findByProductId($productId);
    }
}