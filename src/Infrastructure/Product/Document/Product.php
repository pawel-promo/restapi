<?php

declare(strict_types=1);

namespace Infrastructure\Product\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Domain\Product\Model\ProductDto;

/**
 * @MongoDB\Document
 */
class Product
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $productId;

    /**
     * @MongoDB\Field(type="string")
     */
    private $name;

    /**
     * @MongoDB\Field(type="integer")
     */
    private $price;

    /**
     * @MongoDB\Field(type="string")
     */
    private $currency;
    /**
     * @MongoDB\Field(type="string")
     */
    private $description;

    /** @MongoDB\EmbedMany(targetDocument=Attribute::class) */
    private $attributes;

    public function __construct(string $productId, string $name, int $price, string $currency, ?string $description, ArrayCollection $attributes)
    {
        $this->productId = $productId;
        $this->name = $name;
        $this->price = $price;
        $this->currency = $currency;
        $this->description = $description;
        $this->attributes = $attributes;
    }

    public static function createFromDto(ProductDto $product): Product
    {
        $attributes = new ArrayCollection();
        foreach ($product->getAttributes() as $attribute) {
            $attributes->add(Attribute::createFromDto($attribute));
        }

        return new self(
            $product->getProductId(),
            $product->getName(),
            $product->getPrice(),
            $product->getCurrency(),
            $product->getDescription(),
            $attributes
        );
    }
}
