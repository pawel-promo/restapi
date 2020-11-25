<?php

declare(strict_types=1);

namespace Application\Share\Bus\Query;

interface QueryBusInterface
{
    public function handle(QueryInterface $query);
}
