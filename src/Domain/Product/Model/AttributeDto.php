<?php

declare(strict_types=1);

namespace Domain\Product\Model;

use Domain\Share\Model\Model;

class AttributeDto extends Model
{
    /** @var string */
    private $name;

    /** @var array */
    private $values;

    public function __construct(string $name, array $values)
    {
        $this->name = $name;
        $this->values = $values;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function setValues(array $values): void
    {
        $this->values = $values;
    }

}
