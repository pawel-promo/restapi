<?php

declare(strict_types=1);

namespace Domain\Product\Model;

use Domain\Share\Model\Model;

class ProductDto extends Model
{

    /* @var string */
    private $name;

    /* @var string */
    private $productId;

    /** @var int */
    private $price;

    /**@var string */
    private $currency;

    /** @var string|null */
    private $description;

    /** @var AttributeDto[] */
    private $attributes;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function setProductId(string $productId): void
    {
        $this->productId = $productId;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function addAttribute(AttributeDto $attribute): void
    {
        $this->attributes[] = $attribute;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
