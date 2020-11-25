<?php

declare(strict_types=1);

namespace Infrastructure\Share\Bus\Command;

use Application\Share\Bus\Command\CommandBusInterface;
use Application\Share\Bus\Command\CommandInterface;
use League\Tactician\CommandBus;

class TacticianCommandBus implements CommandBusInterface
{
    /** @var CommandBus */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function dispatch(CommandInterface $command): void
    {
        $this->commandBus->handle($command);
    }
}
