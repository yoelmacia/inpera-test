<?php

declare(strict_types=1);

namespace Post\Handler;

use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class PostReadHandlerFactory
{
    public function __invoke(ContainerInterface $container) : PostReadHandler
    {
        $entityManager = $container->get(EntityManager::class);
        return new PostReadHandler($entityManager);
    }
}
