<?php

declare(strict_types=1);

namespace Infrastructure\Repository\Write;

use Doctrine\ODM\MongoDB\DocumentManager;
use Domain\Product\Model\ProductDto;
use Domain\Product\Repository\SaveProductInterface;
use Infrastructure\Product\Document\Product;

class MongoWriteProductRepository implements SaveProductInterface
{
    /** @var DocumentManager */
    private $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function saveProduct(ProductDto $product): void
    {
        $this->documentManager->persist(Product::createFromDto($product));
        $this->documentManager->flush();
    }

}
