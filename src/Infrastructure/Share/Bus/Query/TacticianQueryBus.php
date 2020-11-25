<?php

declare(strict_types=1);

namespace Infrastructure\Share\Bus\Query;

use Application\Share\Bus\Query\QueryBusInterface;
use Application\Share\Bus\Query\QueryInterface;
use League\Tactician\CommandBus as QueryBus;

class TacticianQueryBus implements QueryBusInterface
{
    /** @var QueryBus */
    private $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function handle(QueryInterface $query)
    {
        return $this->queryBus->handle($query);
    }
}
