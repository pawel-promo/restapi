<?php

declare(strict_types=1);

namespace Domain\Product\Repository;

use Domain\Product\Model\ProductDto;

interface SaveProductInterface
{
    public function saveProduct(ProductDto $product): void;
}
