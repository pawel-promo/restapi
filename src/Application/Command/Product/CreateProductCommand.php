<?php

declare(strict_types=1);

namespace Application\Command\Product;

use Application\Share\Bus\Command\CommandInterface;
use Domain\Product\Model\ProductDto;

class CreateProductCommand implements CommandInterface
{
    /** @var ProductDto */
    private $product;

    public function __construct(ProductDto $product)
    {
        $this->product = $product;
    }

    public function product(): ProductDto
    {
        return $this->product;
    }
}
