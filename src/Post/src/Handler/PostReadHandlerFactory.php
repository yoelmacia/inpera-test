<?php

declare(strict_types=1);

namespace Post\Handler;

use Psr\Container\ContainerInterface;

class PostReadHandlerFactory
{
    public function __invoke(ContainerInterface $container) : PostReadHandler
    {
        return new PostReadHandler();
    }
}
