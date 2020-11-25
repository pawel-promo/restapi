<?php

declare(strict_types=1);

namespace Application\Share\Bus\Command;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): void;
}
