<?php

declare(strict_types=1);

namespace Domain\Share\Model;

interface ViewDataInterface
{
    public function toArray(): array;
}
