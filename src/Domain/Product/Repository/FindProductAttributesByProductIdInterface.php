<?php

declare(strict_types=1);

namespace Domain\Product\Repository;

interface FindProductAttributesByProductIdInterface
{
    public function findProductAttributesByProductId(string $productId): array;

}