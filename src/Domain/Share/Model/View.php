<?php

declare(strict_types=1);

namespace Domain\Share\Model;

class View extends Model
{
    /** @var ViewDataInterface */
    private $data;

    public function __construct(ViewDataInterface $data)
    {
        $this->data = $data;
    }

    public function data(): ViewDataInterface
    {
        return $this->data;
    }
}
