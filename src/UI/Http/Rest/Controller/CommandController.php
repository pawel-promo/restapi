<?php

declare(strict_types=1);

namespace UI\Http\Rest\Controller;

use Application\Share\Bus\Command\CommandBusInterface;
use Application\Share\Bus\Command\CommandInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class CommandController extends AbstractController implements ControllerInterface
{
    /** @var CommandBusInterface */
    private $commandBus;

    public function __construct(CommandBusInterface $commandBus) {
        $this->commandBus = $commandBus;
    }

    public function exec(CommandInterface $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
