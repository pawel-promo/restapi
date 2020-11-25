<?php

declare(strict_types=1);

namespace Infrastructure\Product\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Domain\Product\Model\AttributeDto;

/**
 * @MongoDB\EmbeddedDocument()
 */
class Attribute
{
    /**
     * @MongoDB\Field(type="string")
     */
    private $name;

    /**
     * @MongoDB\Field(type="collection")
     */
    private $values;

    public function __construct(string $name, array $values)
    {
        $this->name = $name;
        $this->values = $values;
    }


    public static function createFromDto(AttributeDto $attribute): Attribute
    {
        return new self(
            $attribute->getName(),
            $attribute->getValues()
        );
    }

}
