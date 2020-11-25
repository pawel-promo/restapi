<?php

declare(strict_types=1);

namespace Application\Command\Product;

use Domain\Product\Repository\FindProductAttributesByProductIdInterface;
use Application\Share\Bus\Command\CommandHandlerInterface;
use Domain\Product\Repository\SaveProductInterface;

class CreateProductHandler implements CommandHandlerInterface
{
    /** @var FindProductAttributesByProductIdInterface */
    private $readProductAttributesRepository;

    /** @var SaveProductInterface */
    private $writeProductRepository;

    public function __construct(
        FindProductAttributesByProductIdInterface $readProductAttributesRepository,
        SaveProductInterface $writeProductRepository)
    {
        $this->readProductAttributesRepository = $readProductAttributesRepository;
        $this->writeProductRepository = $writeProductRepository;
    }

    public function __invoke(CreateProductCommand $command): void
    {

        $product = $command->product();
        $attributes = $this->readProductAttributesRepository->findProductAttributesByProductId(
            $product->getProductId()
        );

        foreach ($attributes as $attribute) {
            $product->addAttribute($attribute);
        }

        $this->writeProductRepository->saveProduct($product);

    }
}

