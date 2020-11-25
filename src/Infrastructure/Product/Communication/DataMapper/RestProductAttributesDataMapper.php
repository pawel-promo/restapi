<?php

declare(strict_types=1);

namespace Infrastructure\Product\Communication\DataMapper;

use Domain\Product\Model\AttributeDto;

class RestProductAttributesDataMapper
{
    public function fromResponse(array $data): array
    {
        $attributes = [];
        foreach ($data as $name => $values) {
            $attributes[] = new AttributeDto($name, $values);
        }
        return $attributes;
    }
}